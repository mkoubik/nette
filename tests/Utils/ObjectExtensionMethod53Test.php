<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectExtensionMethod53Test extends TestCase
{

	/**
	 * Nette\Object extension method 5.3
	 */
	public function testNetteObjectExtensionMethod53()
	{
		require __DIR__ . '/Object.inc';



		TestClass::extensionMethod('join',
			function (TestClass $that, $separator) {
				return $that->foo . $separator . $that->bar;
			}
		);

		$obj = new TestClass('Hello', 'World');
		$this->assertSame( 'Hello*World', $obj->join('*') );
	}

}
