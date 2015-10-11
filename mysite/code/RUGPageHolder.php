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
    'RUGUserForm'
  );

  public function RUGUserForm() {
    $fields = array(
      'Name',
      'Email'
    );
    $actions = FieldList::create(FormAction::create('doRUGUser', 'Generate a Random User!'));
    return Form::create($this, 'RUGUserForm', $fields, $actions);

  }

  public function doRUGUser($data, $form) {
    $submission = RUGUserFormSub::create();
    $form->saveInto($submission);
    $submission->write();
    return $this->redirectBack();
  }

}
