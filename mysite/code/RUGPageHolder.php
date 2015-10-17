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
    'createruguser'
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

	  $response = NULL;
	  if (isset($_GET)) {
		$var = Convert::raw2xml($this->getRequest()->getVars());
		echo('var');
		var_dump($var);
		if ($var[0] == 'rug') {
			$getfield = "?nat=au";
		} elseif ($var[0] == 'lego') {
			$getfield = "?lego";
			$isLego = true;
		} else {
			$getfield = false;
		}
		echo('getfield');
		var_dump($getfield);
		if ($getfield != false) {
			$request = str('http://api.randomuser.me/' + $getfield);
			echo('request');
			var_dump($request);
			$curl = curl_init($request);
			$reponse = curl_exec($curl);
			echo('response');
			var_dump($response);

	    }
	  }
	  return $response;
	}
}
