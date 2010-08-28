<?php

/**
 * Nette Framework test
 */

use Nette\ArrayTools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayToolsGetRefTest extends TestCase
{

	/**
	 * Nette\ArrayTools::getRef()
	 */
	public function testNetteArrayToolsGetRef()
	{
		$arr  = array(
			NULL => 'first',
			1 => 'second',
			7 => array(
				'item' => 'third',
			),
		);

		// Single item

		$dolly = $arr;
		$item = & ArrayTools::getRef($dolly, NULL);
		$item = 'changed';
		$this->assertSame( array(
			'' => 'changed',
			1 => 'second',
			7 => array(
				'item' => 'third',
			),
		), $dolly );


		$dolly = $arr;
		$item = & ArrayTools::getRef($dolly, 'undefined');
		$item = 'changed';
		$this->assertSame( array(
			'' => 'first',
			1 => 'second',
			7 => array(
				'item' => 'third',
			),
			'undefined' => 'changed',
		), $dolly );



		// Traversing

		$dolly = $arr;
		$item = & ArrayTools::getRef($dolly, array());
		$item = 'changed';
		$this->assertSame( 'changed', $dolly );


		$dolly = $arr;
		$item = & ArrayTools::getRef($dolly, array(7, 'item'));
		$item = 'changed';
		$this->assertSame( array(
			'' => 'first',
			1 => 'second',
			7 => array(
				'item' => 'changed',
			),
		), $dolly );



		// Error

		try {
			$dolly = $arr;
			$item = & ArrayTools::getRef($dolly, array(7, 'item', 3));
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', 'Traversed item is not an array.', $e );
		}
	}

}
