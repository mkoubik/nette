<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsSearchKeyTest extends TestCase
{

	/**
	 * Nette\ArrayTools::searchKey()
	 */
	public function testNetteArrayToolsSearchKey()
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


		$this->assertSame( 2, ArrayTools::searchKey($arr, '1') );
		$this->assertSame( 2, ArrayTools::searchKey($arr, 1) );
		$this->assertSame( 1, ArrayTools::searchKey($arr, 0) );
		$this->assertSame( 0, ArrayTools::searchKey($arr, NULL) );
		$this->assertSame( 0, ArrayTools::searchKey($arr, '') );
		$this->assertFalse( ArrayTools::searchKey($arr, 'undefined') );
	}

}
