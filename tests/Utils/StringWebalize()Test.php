<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringWebalizeTest extends TestCase
{

	/**
	 * Nette\String::webalize()
	 */
	public function testNetteStringWebalize()
	{
		$this->assertSame( 'zlutoucky-kun-oooo', String::webalize("&\xc5\xbdLU\xc5\xa4OU\xc4\x8cK\xc3\x9d K\xc5\xae\xc5\x87 \xc3\xb6\xc5\x91\xc3\xb4o!") ); // &ŽLUŤOUČKÝ KŮŇ öőôo!
		$this->assertSame( 'ZLUTOUCKY-KUN-oooo', String::webalize("&\xc5\xbdLU\xc5\xa4OU\xc4\x8cK\xc3\x9d K\xc5\xae\xc5\x87 \xc3\xb6\xc5\x91\xc3\xb4o!", NULL, FALSE) ); // &ŽLUŤOUČKÝ KŮŇ öőôo!
		$this->assertSame( '1-4-!',  String::webalize("\xc2\xBC!", '!') );
	}

}
