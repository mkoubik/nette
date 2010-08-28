<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\PropertyReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class PropertyReflectionTest extends TestCase
{

	/**
	 * PropertyReflection tests.
	 */
	public function testPropertyReflectionTests()
	{
		class A
		{
			public $prop;
		}

		class B extends A
		{
		}

		$propInfo = new PropertyReflection('B', 'prop');
		$this->assertEqual( new Nette\Reflection\ClassReflection('A'), $propInfo->getDeclaringClass() );
	}

}
