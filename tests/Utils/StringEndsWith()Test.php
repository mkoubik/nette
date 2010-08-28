<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringEndsWithTest extends TestCase
{

	/**
	 * Nette\String::endsWith()
	 */
	public function testNetteStringEndsWith()
	{
		$this->assertTrue( String::endsWith('123', NULL), "endsWith('123', NULL)" );
		$this->assertTrue( String::endsWith('123', ''), "endsWith('123', '')" );
		$this->assertTrue( String::endsWith('123', '3'), "endsWith('123', '3')" );
		$this->assertFalse( String::endsWith('123', '2'), "endsWith('123', '2')" );
		$this->assertTrue( String::endsWith('123', '123'), "endsWith('123', '123')" );
		$this->assertFalse( String::endsWith('123', '1234'), "endsWith('123', '1234')" );
	}

}
