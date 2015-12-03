<?php
class RUGPageHolder extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class RUGPageHolder_Controller extends Page_Controller {

  static $allowed_actions = array(
    'getuser',
		'StatusMessage'
  );

	private static $_message = array();

	public function StatusMessage() {
		if(!empty(self::$_message)) {
			return new ArrayData(self::$_message);
		}

		if(Session::get('ActionMessage')) {
			$message = Session::get('ActionMessage');
			$status = Session::get('ActionStatus');

			Session::clear('ActionMessage');
			Session::clear('ActionStatus');

			self::$_message = array('Message' => $message, 'Status' => $status);
			return new ArrayData(self::$_message);
		}

		return false;
	}

	public function getuser(){

	  $response = NULL;
	  if (isset($_GET)) {
			$var = Convert::raw2xml(array_keys($_GET)[1]);
			if ($var == 'rug') {
				$getfield = "?nat=au";
				$isLego = false;
			} elseif ($var == 'lego') {
				$getfield = "?lego";
				$isLego = true;
			} else {
				$getfield = false;
			}
			if ($getfield != false) {
				$request = "http://api.randomuser.me/" . $getfield;
				$curl = curl_init($request);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$response = json_decode(curl_exec($curl), true);
			}
			if ($response != NULL) {
				$newmember = Member::create();
				$newmember->setField('FirstName', ucfirst($response['results']['0']['user']['name']['first']));
				$newmember->setField('Surname', ucfirst($response['results']['0']['user']['name']['last']));
				$newmember->setField('Email', $response['results']['0']['user']['email']);
				$newmember->setField('Username', $response['results']['0']['user']['username']);
				$newmember->setField('Lego', $isLego);
				// $newmember->setField('Portrait', $response['results']['0']['user']['picture']['large']);

				$newthumb = file_get_contents($response['results']['0']['user']['picture']['thumbnail']);
				$thumbpath = 'assets/thumbs/' . $newmember->FirstName . '-' . $newmember->Surname. '.jpg';
				file_put_contents(BASE_PATH . '/' . $thumbpath, $newthumb);
				$thumbname = $newmember->FirstName . '-' . $newmember->Surname. '.jpg';
				$thumbfile = Image::create();
				$thumbfile->Name = $thumbname;
				$thumbfile->ParentID = 7;

				$thumbfile->write();

				$newmember->ThumbnailID = $thumbfile->ID;
				$newmember->write();
				$newmember->addToGroupByCode('RUGUsers');
				Session::set('ActionStatus', 'success');
				Session::set('ActionMessage', 'New user successfully added!');
			}
		}

	return $this->redirectBack();
	}

	public function getRUGUsers() {
		return Group::get()->filter(array('Code' => 'RUGUsers'))->first()->Members();
	}
}
