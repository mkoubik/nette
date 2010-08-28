<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringMatchTest extends TestCase
{

	/**
	 * Nette\String::match()
	 */
	public function testNetteStringMatch()
	{
		$this->assertNull( String::match('hello world!', '#([E-L])+#') );

		$this->assertSame( array('hell',	'l'), String::match('hello world!', '#([e-l])+#') );

		$this->assertSame( array('hell'), String::match('hello world!', '#[e-l]+#') );

		$this->assertSame( array(array('hell', 0)), String::match('hello world!', '#[e-l]+#', PREG_OFFSET_CAPTURE) );

		$this->assertSame( array('ll'), String::match('hello world!', '#[e-l]+#', NULL, 2) );
	}

}
