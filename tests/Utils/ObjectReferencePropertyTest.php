<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectReferencePropertyTest extends TestCase
{

	/**
	 * Nette\Object reference to property.
	 */
	public function testNetteObjectReferenceToProperty()
	{
		require __DIR__ . '/Object.inc';



		$obj = new TestClass;
		$obj->foo = 'hello';
		@$x = & $obj->foo;
		$x = 'changed by reference';
		$this->assertSame( 'hello', $obj->foo );
	}

}
