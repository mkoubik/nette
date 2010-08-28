<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringNormalizeTest extends TestCase
{

	/**
	 * Nette\String::normalize()
	 */
	public function testNetteStringNormalize()
	{
		$this->assertSame( "Hello\n  World",  String::normalize("\r\nHello  \r  World \n\n") );
	}

}
