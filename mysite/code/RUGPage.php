<?php
class RUGPage extends Page {

	private static $db = array(
		'Gender' => 'Varchar(10)',
		'Name' => 'Varchar(50)',
		'Street' => 'Varchar(50)',
		'City' => 'Varchar(50)',
		'State' => 'Varchar(50)',
		'Zip' => 'Integer',
		'Email' => 'Varchar(50)',
		'Username' => 'Varchar(50)',
		'Password' => 'Varchar(50)',
		'Salt' => 'Varchar(50)',
		'MD5' => 'Varchar(50)',
		'SHA1' => 'Varchar(50)',
		'SHA256' => 'Varchar(50)',
		'Registered' => 'Integer',
		'DOB' => 'Integer',
		'Phone' => 'Varchar(15)',
		'Cell' => 'Varchar(15)',
		'DNI' => 'Varchar(15)',
		'PicL' => 'Image',
		'PicM' => 'Image',
		'PicThumb' => 'Image',
		'Version' => 'Float',
		'Nationality' => 'Varchar(2)',
		'Seed' => 'Varchar(15)'
	);

	private static $has_one = array(
	);

	private static $can_be_root = false;

}
class RUGPage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

}
