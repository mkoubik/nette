<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringToAsciiTest extends TestCase
{

	/**
	 * Nette\String::toAscii
	 */
	public function testNetteStringToAscii()
	{
		$this->assertSame( 'ZLUTOUCKY KUN oooo', String::toAscii("\xc5\xbdLU\xc5\xa4OU\xc4\x8cK\xc3\x9d K\xc5\xae\xc5\x87 \xc3\xb6\xc5\x91\xc3\xb4o") ); // ŽLUŤOUČKÝ KŮŇ öőôo
		$this->assertSame( 'Z `\'"^~', String::toAscii("\xc5\xbd `'\"^~") );
	}

}
