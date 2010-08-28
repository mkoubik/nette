<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectReflectionTest extends TestCase
{

	/**
	 * Nette\Object reflection.
	 */
	public function testNetteObjectReflection()
	{
		require __DIR__ . '/Object.inc';



		$obj = new TestClass;
		$this->assertSame( 'TestClass', $obj->getReflection()->getName() );
		$this->assertSame( 'TestClass', $obj->Reflection->getName() );
	}

}
