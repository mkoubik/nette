<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsGrep001Test extends TestCase
{

	/**
	 * Nette\ArrayTools::grep()
	 */
	public function testNetteArrayToolsGrep()
	{
		$this->assertSame( array(
			1 => '1',
		), ArrayTools::grep(array('a', '1', 'c'), '#\d#') );

		$this->assertSame( array(
			0 => 'a',
			2 => 'c',
		), ArrayTools::grep(array('a', '1', 'c'), '#\d#', PREG_GREP_INVERT) );
	}

}
