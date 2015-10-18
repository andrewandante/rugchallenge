<?php
class RUGPageHolder extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class RUGPageHolder_Controller extends Page_Controller {

  public function init() {
    parent::init();

    Requirements::javascript("https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js");
    Requirements::javascript("themes/snugbugrug/javascript/GetRUGUser.js");
  }

  static $allowed_actions = array(
    'RUGUserForm',
    'getuser'
  );

  // public function RUGUserForm() {
  //   $fields = FieldList::create(
  //     TextField::create('FirstName', 'First Name'),
  //     TextField::create('Surname'),
  //     TextField::create('Email')
  //   );
  //   $actions = FieldList::create(FormAction::create('doRUGUser', 'Generate a Random User!'));
  //   return Form::create($this, 'RUGUserForm', $fields, $actions);
	//
  // }

  // public function doRUGUser($data, $form) {
  //   $member = Member::create();
  //   $form->saveInto($member);
  //   $member->write();
  //   return $this->redirectBack();
  // }

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
				$newmember->setField('Firstname', $response['results']['0']['user']['name']['first']);
				$newmember->setField('Surname', $response['results']['0']['user']['name']['last']);
				$newmember->setField('Email', $response['results']['0']['user']['email']);
				$newmember->setField('Username', $response['results']['0']['user']['username']);
				$newmember->setField('Lego', $isLego);
				// var_dump($fields);
				var_dump($newmember);
				// $fields->addTo($newmember);
				$newmember->write();

			}
		}

	  return $newmember;
	}
}
