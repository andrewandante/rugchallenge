<?php
class RUGPageHolder extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class RUGPageHolder_Controller extends Page_Controller {

  public function getRUGUser() {
    $response = http_get("http://api.randomuser.me/?lego", array("timeout"=>1), $info);
    echo("lol");
    echo($info);
    

  }

}
