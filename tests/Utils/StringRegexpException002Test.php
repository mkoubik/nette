<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringRegexpException002Test extends TestCase
{

	/**
	 * Nette\String and RegexpException run-time error.
	 */
	public function testNetteStringAndRegexpExceptionRunTimeError()
	{
		try {
			String::split("0123456789\xFF", '#\d#u');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'Malformed UTF-8 data (pattern: #\d#u)', $e );
		}

		try {
			String::match("0123456789\xFF", '#\d#u');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'Malformed UTF-8 data (pattern: #\d#u)', $e );
		}

		try {
			String::matchAll("0123456789\xFF", '#\d#u');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'Malformed UTF-8 data (pattern: #\d#u)', $e );
		}

		try {
			String::replace("0123456789\xFF", '#\d#u', 'x');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'Malformed UTF-8 data (pattern: #\d#u)', $e );
		}
	}

}
