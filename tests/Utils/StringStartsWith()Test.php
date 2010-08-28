<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringStartsWithTest extends TestCase
{

	/**
	 * Nette\String::startsWith()
	 */
	public function testNetteStringStartsWith()
	{
		$this->assertTrue( String::startsWith('123', NULL), "startsWith('123', NULL)" );
		$this->assertTrue( String::startsWith('123', ''), "startsWith('123', '')" );
		$this->assertTrue( String::startsWith('123', '1'), "startsWith('123', '1')" );
		$this->assertFalse( String::startsWith('123', '2'), "startsWith('123', '2')" );
		$this->assertTrue( String::startsWith('123', '123'), "startsWith('123', '123')" );
		$this->assertFalse( String::startsWith('123', '1234'), "startsWith('123', '1234')" );
	}

}
