<?php
class RUGPage extends Page {

	private static $db = array(
		'Name' => 'Varchar(50)',
		'Gender' => 'Varchar(10)',
		'Street' => 'Varchar(50)',
		'City' => 'Varchar(50)',
		'State' => 'Varchar(50)',
		'Zip' => 'Int',
		'Email' => 'Varchar(50)',
		'Username' => 'Varchar(50)',
		'Password' => 'Varchar(50)',
		'Salt' => 'Varchar(50)',
		'MD5' => 'Varchar(50)',
		'SHA1' => 'Varchar(50)',
		'SHA256' => 'Varchar(50)',
		'Registered' => 'Int',
		'DOB' => 'Int',
		'Phone' => 'Varchar(15)',
		'Cell' => 'Varchar(15)',
		'DNI' => 'Varchar(15)',
		#'PicL' => 'Image',
		#'PicM' => 'Image',
		#'PicThumb' => 'Image',
		'Version' => 'Float',
		'Nationality' => 'Varchar(2)',
		'Seed' => 'Varchar(15)'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Main', TextField::create('Name', 'Name of User'));
		$fields->addFieldToTab('Root.Main', TextField::create('Username', 'Username'));
		$fields->addFieldToTab('Root.Main', TextField::create('Email', 'Email address'));
		$fields->addFieldToTab('Root.Main', DropDownField::create('Gender', 'Gender'));

		$fields->addFieldToTab('Root.Contact', TextField::create('Nationality', 'Nationality'));
		$fields->addFieldToTab('Root.Contact', TextField::create('Street', 'Street Address'));
		$fields->addFieldToTab('Root.Contact', TextField::create('City', 'City'));
		$fields->addFieldToTab('Root.Contact', TextField::create('State', 'State or Province'));
		$fields->addFieldToTab('Root.Contact', TextField::create('Zip', 'Zip/Postal Code'));
		$fields->addFieldToTab('Root.Contact', TextField::create('Phone', 'Phone Number'));
		$fields->addFieldToTab('Root.Contact', TextField::create('Mobile', 'Mobile Number'));

		$fields->addFieldToTab('Root.Technical', TextField::create('Version', 'Version Number'));
		$fields->addFieldToTab('Root.Technical', TextField::create('Seed', 'Seed'));
		$fields->addFieldToTab('Root.Technical', TextField::create('Password', 'Password'));
		$fields->addFieldToTab('Root.Technical', TextField::create('Salt', 'Salt'));
		$fields->addFieldToTab('Root.Technical', TextField::create('MD5', 'MD5'));
		$fields->addFieldToTab('Root.Technical', TextField::create('SHA1', 'SHA1'));
		$fields->addFieldToTab('Root.Technical', TextField::create('SHA256', 'SHA256'));

		return $fields;
	}

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
