<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectExtensionMethodTest extends TestCase
{

	/**
	 * Nette\Object extension method.
	 */
	public function testNetteObjectExtensionMethod()
	{
		require __DIR__ . '/Object.inc';



		function TestClass_join(TestClass $that, $separator)
		{
			return $that->foo . $separator . $that->bar;
		}

		TestClass::extensionMethod('TestClass::join', 'TestClass_join');

		$obj = new TestClass('Hello', 'World');
		$this->assertSame( 'Hello*World', $obj->join('*') );
	}

}
