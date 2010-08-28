<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringPadTest extends TestCase
{

	/**
	 * Nette\String::padLeft() & padRight()
	 */
	public function testNetteStringPadLeftPadRight()
	{
		$this->assertSame( "ŤOUŤOUŤŽLU", String::padLeft("\xc5\xbdLU", 10, "\xc5\xa4OU") );
		$this->assertSame( "ŤOUŤOUŽLU", String::padLeft("\xc5\xbdLU", 9, "\xc5\xa4OU") );
		$this->assertSame( "ŽLU", String::padLeft("\xc5\xbdLU", 3, "\xc5\xa4OU") );
		$this->assertSame( "ŽLU", String::padLeft("\xc5\xbdLU", 0, "\xc5\xa4OU") );
		$this->assertSame( "ŽLU", String::padLeft("\xc5\xbdLU", -1, "\xc5\xa4OU") );
		$this->assertSame( "ŤŤŤŤŤŤŤŽLU", String::padLeft("\xc5\xbdLU", 10, "\xc5\xa4") );
		$this->assertSame( "ŽLU", String::padLeft("\xc5\xbdLU", 3, "\xc5\xa4") );
		$this->assertSame( "       ŽLU", String::padLeft("\xc5\xbdLU", 10) );



		$this->assertSame( "ŽLUŤOUŤOUŤ", String::padRight("\xc5\xbdLU", 10, "\xc5\xa4OU") );
		$this->assertSame( "ŽLUŤOUŤOU", String::padRight("\xc5\xbdLU", 9, "\xc5\xa4OU") );
		$this->assertSame( "ŽLU", String::padRight("\xc5\xbdLU", 3, "\xc5\xa4OU") );
		$this->assertSame( "ŽLU", String::padRight("\xc5\xbdLU", 0, "\xc5\xa4OU") );
		$this->assertSame( "ŽLU", String::padRight("\xc5\xbdLU", -1, "\xc5\xa4OU") );
		$this->assertSame( "ŽLUŤŤŤŤŤŤŤ", String::padRight("\xc5\xbdLU", 10, "\xc5\xa4") );
		$this->assertSame( "ŽLU", String::padRight("\xc5\xbdLU", 3, "\xc5\xa4") );
		$this->assertSame( "ŽLU       ", String::padRight("\xc5\xbdLU", 10) );
	}

}
