<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringRegexpException003Test extends TestCase
{

	/**
	 * Nette\String and RegexpException compile error.
	 */
	public function testNetteStringAndRegexpExceptionCompileError()
	{
		try {
			String::split('0123456789', '#*#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'preg_split(): Compilation failed: nothing to repeat at offset 0 in pattern: #*#', $e );
		}

		try {
			String::match('0123456789', '#*#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'preg_match(): Compilation failed: nothing to repeat at offset 0 in pattern: #*#', $e );
		}

		try {
			String::matchAll('0123456789', '#*#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'preg_match_all(): Compilation failed: nothing to repeat at offset 0 in pattern: #*#', $e );
		}

		try {
			String::replace('0123456789', '#*#', 'x');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'preg_replace(): Compilation failed: nothing to repeat at offset 0 in pattern: #*#', $e );
		}
	}

}
