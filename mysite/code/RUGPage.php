<?php
class RUGPage extends Page {

	private static $db = array(
		'Name' => 'Varchar(50)',
		'Street' => 'Varchar(50)',
		'Email' => 'Varchar(50)',
		'Username' => 'Varchar(50)',
	);

	private static $has_one = array(
		'PicL' => 'Image',
		'PicM' => 'Image',
		'PicThumb' => 'Image',
	);

	private static $can_be_root = false;

}

class RUGPage_Controller extends Page_Controller {

	private static $allowed_actions = array(
		'getProfile'
	);

	public function init() {
		parent::init();

	}

	public function getProfile() {

		if ($this->getRequest()->getVar("id")) {

			$user = Member::get_by_id("Member", $this->getRequest()->getVar("id"));

			if (!$user || !$user->inGroup('RUGUsers')) {
				return false;
			} else {
				return $user;
			}

		} else {
			return false;
		}
	}

}
