<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringFixEncodingTest extends TestCase
{

	/**
	 * Nette\String::fixEncoding()
	 */
	public function testNetteStringFixEncoding()
	{
		$this->assertSame( "\xc5\xbea\x01bcde", String::fixEncoding("\xc5\xbea\x01b\xed\xa0\x80c\xef\xbb\xbfd\xf4\x90\x80\x80e") );
	}

}
