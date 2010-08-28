<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsGrep002Test extends TestCase
{

	/**
	 * Nette\ArrayTools::grep() errors.
	 */
	public function testNetteArrayToolsGrepErrors()
	{
		try {
			ArrayTools::grep(array('a', '1', 'c'), '#*#');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'preg_grep(): Compilation failed: nothing to repeat at offset 0 in pattern: #*#', $e );
		}


		try {
			ArrayTools::grep(array('a', "1\xFF", 'c'), '#\d#u');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\RegexpException', 'Malformed UTF-8 data (pattern: #\d#u)', $e );
		}
	}

}
