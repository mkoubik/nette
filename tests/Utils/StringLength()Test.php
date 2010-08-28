<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringLengthTest extends TestCase
{

	/**
	 * Nette\String::length()
	 */
	public function testNetteStringLength()
	{
		$this->assertSame( 0,  String::length('') );
		$this->assertSame( 20,  String::length("I\xc3\xb1t\xc3\xabrn\xc3\xa2ti\xc3\xb4n\xc3\xa0liz\xc3\xa6ti\xc3\xb8n") ); // Iñtërnâtiônàlizætiøn
	}

}
