<?php

// Extend Member Data Object

class RUGMemberExtension extends DataExtension {
  private static $db = array(
    'Username' => 'Varchar(50)',
    'Lego' => 'Boolean'
  );

  public static function getUserByUsername(string $username) {
    return Member::get()->filter('Username', $username)->first();
  }
}
