<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsInsertBeforeTest extends TestCase
{

	/**
	 * Nette\ArrayTools::insertBefore() & insertAfter()
	 */
	public function testNetteArrayToolsInsertBeforeInsertAfter()
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


		// First item
		$dolly = $arr;
		ArrayTools::insertBefore($dolly, NULL, array('new' => 'value'));
		$this->assertSame( array(
			'new' => 'value',
			'' => 'first',
			0 => 'second',
			1 => 'third',
			7 => 'fourth',
		), $dolly );


		$dolly = $arr;
		ArrayTools::insertAfter($dolly, NULL, array('new' => 'value'));
		$this->assertSame( array(
			'' => 'first',
			'new' => 'value',
			0 => 'second',
			1 => 'third',
			7 => 'fourth',
		), $dolly );



		// Last item
		$dolly = $arr;
		ArrayTools::insertBefore($dolly, 7, array('new' => 'value'));
		$this->assertSame( array(
			'' => 'first',
			0 => 'second',
			1 => 'third',
			'new' => 'value',
			7 => 'fourth',
		), $dolly );


		$dolly = $arr;
		ArrayTools::insertAfter($dolly, 7, array('new' => 'value'));
		$this->assertSame( array(
			'' => 'first',
			0 => 'second',
			1 => 'third',
			7 => 'fourth',
			'new' => 'value',
		), $dolly );



		// Undefined item
		$dolly = $arr;
		ArrayTools::insertBefore($dolly, 'undefined', array('new' => 'value'));
		$this->assertSame( array(
			'new' => 'value',
			'' => 'first',
			0 => 'second',
			1 => 'third',
			7 => 'fourth',
		), $dolly );


		$dolly = $arr;
		ArrayTools::insertAfter($dolly, 'undefined', array('new' => 'value'));
		$this->assertSame( array(
			'' => 'first',
			0 => 'second',
			1 => 'third',
			7 => 'fourth',
			'new' => 'value',
		), $dolly );
	}

}
