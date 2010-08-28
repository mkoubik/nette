<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsRenameKeyTest extends TestCase
{

	/**
	 * Nette\ArrayTools::renameKey()
	 */
	public function testNetteArrayToolsRenameKey()
	{
		$arr  = array(
			NULL => 'first',
			FALSE => 'second',
			1 => 'third',
			7 => 'fourth'
		);

		$this->assertSame( array(
			'' => 'first',
			0 => 'second',
			1 => 'third',
			7 => 'fourth',
		), $arr );


		ArrayTools::renameKey($arr, '1', 'new1');
		ArrayTools::renameKey($arr, 0, 'new2');
		ArrayTools::renameKey($arr, NULL, 'new3');
		ArrayTools::renameKey($arr, '', 'new4');
		ArrayTools::renameKey($arr, 'undefined', 'new5');

		$this->assertSame( array(
			'new3' => 'first',
			'new2' => 'second',
			'new1' => 'third',
			7 => 'fourth',
		), $arr );
	}

}
