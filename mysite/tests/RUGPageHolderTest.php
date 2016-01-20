<?php

class RUGPageHolderTest extends SapphireTest {

  protected static $fixture_file = "RUGPageHolderTest.yml";

  public function testgetRUGUsers() {

    $page = $this->objFromFixture('RUGPageHolder', 'testRUGPageHolder');
    $list = $page->getRUGList();
    $firstguy = $list->First();
    $lastguy = $list->Last();

    $this->assertEquals($list->Count(), 2);
    $this->assertEquals($firstguy->Email, "jaspy@test.com");
    $this->assertEquals($lastguy->Email, "johnny@test.com");

  }
}
