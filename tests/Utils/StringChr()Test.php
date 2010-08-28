<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringChrTest extends TestCase
{

	/**
	 * Nette\String::chr()
	 */
	public function testNetteStringChr()
	{
		$this->assertSame( "\x00",  String::chr(0), '#0' );
		$this->assertSame( "\xc3\xbf",  String::chr(255), '#255 in UTF-8' );
		$this->assertSame( "\xFF",  String::chr(255, 'ISO-8859-1'), '#255 in ISO-8859-1' );
	}

}
