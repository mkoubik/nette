<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringCheckEncodingTest extends TestCase
{

	/**
	 * Nette\String::checkEncoding()
	 */
	public function testNetteStringCheckEncoding()
	{
		$this->assertTrue( String::checkEncoding("\xc5\xbelu\xc5\xa5ou\xc4\x8dk\xc3\xbd"), 'UTF-8' ); // žluťoučký
		$this->assertTrue( String::checkEncoding("\x01"), 'C0' );
		$this->assertFalse( String::checkEncoding("\xed\xa0\x80"), 'surrogate pairs' ); // xD800
		$this->assertFalse( String::checkEncoding("\xef\xbb\xbf"), 'noncharacter' ); // xFEFF
		$this->assertFalse( String::checkEncoding("\xf4\x90\x80\x80"), 'out of range' ); // x110000
	}

}
