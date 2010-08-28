<?php

/**
 * Nette Framework test
 */

use Nette\Object,
	Nette\Reflection\ClassReflection;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectExtensionMethodViaInterfaceTest extends TestCase
{

	/**
	 * Nette\Object extension method via interface.
	 */
	public function testNetteObjectExtensionMethodViaInterface()
	{
		require __DIR__ . '/Object.inc';



		function IFirst_join(ISecond $that, $separator)
		{
			return __METHOD__ . ' says ' . $that->foo . $separator . $that->bar;
		}



		function ISecond_join(ISecond $that, $separator)
		{
			return __METHOD__ . ' says ' . $that->foo . $separator . $that->bar;
		}



		ClassReflection::from('IFirst')->setExtensionMethod('join', 'IFirst_join');
		ClassReflection::from('ISecond')->setExtensionMethod('join', 'ISecond_join');

		$obj = new TestClass('Hello', 'World');
		$this->assertSame( 'ISecond_join says Hello*World', $obj->join('*') );
	}

}
