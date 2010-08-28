<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringRegexpException001Test extends TestCase
{

	/**
	 * Nette\String and RegexpException run-time error.
	 */
	public function testNetteStringAndRegexpExceptionRunTimeError()
	{
		ini_set('pcre.backtrack_limit', 3); // forces PREG_BACKTRACK_LIMIT_ERROR

		try {
			String::split('0123456789', '#.*\d#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'Nette\RegexpException', 'Backtrack limit was exhausted (pattern: #.*\d#)', $e );
		}

		try {
			String::match('0123456789', '#.*\d#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'Nette\RegexpException', 'Backtrack limit was exhausted (pattern: #.*\d#)', $e );
		}

		try {
			String::matchAll('0123456789', '#.*\d#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'Nette\RegexpException', 'Backtrack limit was exhausted (pattern: #.*\d#)', $e );
		}

		try {
			String::replace('0123456789', '#.*\d#', 'x');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'Nette\RegexpException', 'Backtrack limit was exhausted (pattern: #.*\d#)', $e );
		}
	}

}
