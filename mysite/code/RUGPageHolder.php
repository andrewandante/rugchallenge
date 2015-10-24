<?php
class RUGPageHolder extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class RUGPageHolder_Controller extends Page_Controller {

  static $allowed_actions = array(
    'getuser'
  );

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
				$newmember->setField('FirstName', $response['results']['0']['user']['name']['first']);
				$newmember->setField('Surname', $response['results']['0']['user']['name']['last']);
				$newmember->setField('Email', $response['results']['0']['user']['email']);
				$newmember->setField('Username', $response['results']['0']['user']['username']);
				$newmember->setField('Lego', $isLego);
				$newmember->write();
				$newmember->addToGroupByCode('RUGUsers');
			}
		}

	  return $this->redirectBack();
	}
}
