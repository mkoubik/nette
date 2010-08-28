<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringIndentTest extends TestCase
{

	/**
	 * Nette\String::indent()
	 */
	public function testNetteStringIndent()
	{
		$this->assertSame( "",  String::indent("") );
		$this->assertSame( "\n",  String::indent("\n") );
		$this->assertSame( "\tword",  String::indent("word") );
		$this->assertSame( "\n\tword",  String::indent("\nword") );
		$this->assertSame( "\n\tword",  String::indent("\nword") );
		$this->assertSame( "\n\tword\n",  String::indent("\nword\n") );
		$this->assertSame( "\r\n\tword\r\n",  String::indent("\r\nword\r\n") );
		$this->assertSame( "\r\n\t\tword\r\n",  String::indent("\r\nword\r\n", 2) );
		$this->assertSame( "\r\n      word\r\n",  String::indent("\r\nword\r\n", 2, '   ') );
	}

}
