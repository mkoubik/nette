<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringReplaceTest extends TestCase
{

	/**
	 * Nette\String::replace()
	 */
	public function testNetteStringReplace()
	{
		class Test
		{
			static function cb() {
				return '@';
			}
		}

		$this->assertSame( 'hello world!', String::replace('hello world!', '#([E-L])+#', '#') );
		$this->assertSame( '#o wor#d!', String::replace('hello world!', '#([e-l])+#', '#') );
		$this->assertSame( '@o wor@d!', String::replace('hello world!', '#[e-l]+#', callback('Test::cb')) );
		$this->assertSame( '@o wor@d!', String::replace('hello world!', '#[e-l]+#', array('Test', 'cb')) );
		$this->assertSame( '#@ @@@#d!', String::replace('hello world!', array(
			'#([e-l])+#' => '#',
			'#[o-w]#' => '@',
		)) );
	}

}
