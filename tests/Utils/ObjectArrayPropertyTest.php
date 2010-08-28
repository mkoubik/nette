<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectArrayPropertyTest extends TestCase
{

	/**
	 * Nette\Object array property.
	 */
	public function testNetteObjectArrayProperty()
	{
		require __DIR__ . '/Object.inc';



		$obj = new TestClass;
		$obj->items[] = 'test';
		$this->assertSame( 'test', $obj->items[0] );


		$obj->items = array();
		$obj->items[] = 'one';
		$obj->items[] = 'two';
		$this->assertSame( 'one', $obj->items[0] );

		$this->assertSame( 'two', $obj->items[1] );
	}

}
