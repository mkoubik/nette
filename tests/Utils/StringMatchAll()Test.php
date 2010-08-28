<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringMatchAllTest extends TestCase
{

	/**
	 * Nette\String::matchAll()
	 */
	public function testNetteStringMatchAll()
	{
		$this->assertSame( array(), String::matchAll('hello world!', '#([E-L])+#') );

		$this->assertSame( array(
			array('hell', 'l'),
			array('l', 'l'),
		), String::matchAll('hello world!', '#([e-l])+#') );

		$this->assertSame( array(
			array('hell'),
			array('l'),
		), String::matchAll('hello world!', '#[e-l]+#') );

		$this->assertSame( array(
			array(
				array('hell', 0),
			),
			array(
				array('l', 9),
			),
		), String::matchAll('hello world!', '#[e-l]+#', PREG_OFFSET_CAPTURE) );

		$this->assertSame( array(array('ll',	'l')), String::matchAll('hello world!', '#[e-l]+#', PREG_PATTERN_ORDER, 2) );
	}

}
