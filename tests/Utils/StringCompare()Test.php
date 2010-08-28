<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringCompareTest extends TestCase
{

	/**
	 * Nette\String::compare()
	 */
	public function testNetteStringCompare()
	{
		$this->assertSame( TRUE,  String::compare('', '') );
		$this->assertSame( TRUE,  String::compare('', '', 0) );
		$this->assertSame( TRUE,  String::compare('', '', 1) );
		$this->assertSame( FALSE, String::compare('xy', 'xx') );
		$this->assertSame( TRUE,  String::compare('xy', 'xx', 0) );
		$this->assertSame( TRUE,  String::compare('xy', 'xx', 1) );
		$this->assertSame( FALSE, String::compare('xy', 'yy', 1) );
		$this->assertSame( TRUE,  String::compare('xy', 'yy', -1) );
		$this->assertSame( TRUE,  String::compare('xy', 'yy', -1) );
		$this->assertSame( TRUE,  String::compare("I\xc3\xb1t\xc3\xabrn\xc3\xa2ti\xc3\xb4n\xc3\xa0liz\xc3\xa6ti\xc3\xb8n", "I\xc3\x91T\xc3\x8bRN\xc3\x82TI\xc3\x94N\xc3\x80LIZ\xc3\x86TI\xc3\x98N") ); // Iñtërnâtiônàlizætiøn
		$this->assertSame( TRUE,  String::compare("I\xc3\xb1t\xc3\xabrn\xc3\xa2ti\xc3\xb4n\xc3\xa0liz\xc3\xa6ti\xc3\xb8n", "I\xc3\x91T\xc3\x8bRN\xc3\x82TI\xc3\x94N\xc3\x80LIZ\xc3\x86TI\xc3\x98N", 10) );
	}

}
