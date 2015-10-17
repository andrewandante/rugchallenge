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

  public function RUGUserForm() {
    $fields = FieldList::create(
      TextField::create('FirstName', 'First Name'),
      TextField::create('Surname'),
      TextField::create('Email')
    );
    $actions = FieldList::create(FormAction::create('doRUGUser', 'Generate a Random User!'));
    return Form::create($this, 'RUGUserForm', $fields, $actions);

  }

  public function doRUGUser($data, $form) {
    $member = Member::create();
    $form->saveInto($member);
    $member->write();
    return $this->redirectBack();
  }

	public function getuser(){


	  echo "the function is running\n";
	  $response = NULL;
	  if (isset($_GET)) {
		print_r($_GET);
		$var = Convert::raw2xml(array_keys($_GET)[1]);
		echo "var\n";
		var_dump($var);
		if ($var == 'rug') {
			$getfield = "?nat=au";
		} elseif ($var == 'lego') {
			$getfield = "?lego";
			$isLego = true;
		} else {
			$getfield = false;
		}
		echo "getfield\n";
		var_dump($getfield);
		if ($getfield != false) {
			$request = "http://api.randomuser.me/" . $getfield;
			echo "request\n";
			var_dump($request);
			$curl = curl_init($request);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
			echo "response\n";

	    }
	  }
	  return $response;
	}
}
