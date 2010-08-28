<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringTrimTest extends TestCase
{

	/**
	 * Nette\String::trim()
	 */
	public function testNetteStringTrim()
	{
		$this->assertSame( 'x',  String::trim(" \t\n\r\x00\x0B\xC2\xA0x") );
		$this->assertSame( 'a b',  String::trim(' a b ') );
		$this->assertSame( ' a b ',  String::trim(' a b ', '') );
		$this->assertSame( 'e',  String::trim("\xc5\x98e-", "\xc5\x98-") ); // Ře-

		try {
			String::trim("\xC2x\xA0");
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', NULL, $e );
		}
	}

}
