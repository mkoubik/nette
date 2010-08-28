<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringSplitTest extends TestCase
{

	/**
	 * Nette\String::split()
	 */
	public function testNetteStringSplit()
	{
		$this->assertSame( array(
			'a',
			',',
			'b',
			',',
			'c',
		), String::split('a, b, c', '#(,)\s*#') );

		$this->assertSame( array(
			'a',
			',',
			'b',
			',',
			'c',
		), String::split('a, b, c', '#(,)\s*#', PREG_SPLIT_NO_EMPTY) );
	}

}
