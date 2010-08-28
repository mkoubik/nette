<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsGetTest extends TestCase
{

	/**
	 * Nette\ArrayTools::get()
	 */
	public function testNetteArrayToolsGet()
	{
		$arr  = array(
			NULL => 'first',
			1 => 'second',
			7 => array(
				'item' => 'third',
			),
		);

		// Single item

		$this->assertSame( 'first', ArrayTools::get($arr, NULL) );
		$this->assertSame( 'second', ArrayTools::get($arr, 1) );
		$this->assertSame( 'second', ArrayTools::get($arr, 1, 'x') );
		$this->assertSame( 'x', ArrayTools::get($arr, 'undefined', 'x') );
		$this->assertNull( ArrayTools::get($arr, 'undefined') );



		// Traversing

		$this->assertSame( array(
			'' => 'first',
			1 => 'second',
			7 => array(
				'item' => 'third',
			),
		), ArrayTools::get($arr, array()) );


		$this->assertSame( 'third', ArrayTools::get($arr, array(7, 'item')) );
	}

}
