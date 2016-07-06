<?php
class RUGPageHolder extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

	public function getRUGList() {

		return Group::get()->filter(array('Code' => 'RUGUsers'))->first()->Members()->sort('Created DESC');
	}

}

class RUGPageHolder_Controller extends Page_Controller {

	public function init() {
		parent::init();

	}

  static $allowed_actions = array(
		'getuser',
		'StatusMessage'
  );

	private static $_message = array();

	public function StatusMessage() {
		if (!empty(self::$_message)) {
			return new ArrayData(self::$_message);
		}

		if (Session::get('ActionMessage')) {
			$message = Session::get('ActionMessage');
			$status = Session::get('ActionStatus');

			Session::clear('ActionMessage');
			Session::clear('ActionStatus');

			self::$_message = array('Message' => $message, 'Status' => $status);
			return new ArrayData(self::$_message);
		}

		return false;
	}

	public function grabRUGImage($call, $xmember, $type, $folderid) {
		$newimage = file_get_contents($call['results']['0']['user']['picture'][$type]);
		$imagename = $xmember->FirstName . '-' . $xmember->Surname . '-' . $type . '.jpg';
		$imagepath = 'assets/' . $type . '/' . $imagename;
		file_put_contents(BASE_PATH . '/' . $imagepath, $newimage);
		$imagefile = Image::create();
		$imagefile->Name = $imagename;
		$imagefile->ParentID = $folderid;
		$imagefile->write();

		return $imagefile->ID;
	}

	public function getuser() {

	  $response = false;
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
			if ($getfield) {
				$request = "http://api.randomuser.me/" . $getfield;
				$curl = curl_init($request);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$response = json_decode(curl_exec($curl), true);
			}
			if ($response) {
				$newmember = Member::create();
				$newmember->setField('FirstName', ucfirst($response['results']['0']['user']['name']['first']));
				$newmember->setField('Surname', ucfirst($response['results']['0']['user']['name']['last']));
				$newmember->setField('Email', $response['results']['0']['user']['email']);
				$newmember->setField('Username', $response['results']['0']['user']['username']);
				$newmember->setField('Lego', $isLego);

				$newmember->ThumbnailID = $this->grabRUGImage($response, $newmember, 'thumbnail', 7);
				$newmember->LargeID = $this->grabRUGImage($response, $newmember, 'large', 132);

				$newmember->write();
				$newmember->addToGroupByCode('RUGUsers');
				Session::set('ActionStatus', 'success');
				Session::set('ActionMessage', 'New user successfully added!');
			}
		}

	return $this->redirectBack('/');
	}

	public function getRUGUsers() {
		$list = $this->dataRecord->getRUGList();
		$pages = new PaginatedList($list, $this->getRequest());
		$pages->setPageLength(4); // Should be 4 probably
		return $pages;
	}
}
