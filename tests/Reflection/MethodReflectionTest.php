<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\MethodReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class MethodReflectionTest extends TestCase
{

	/**
	 * MethodReflection tests.
	 */
	public function testMethodReflectionTests()
	{
		class A {
			static function foo($a, $b) {
				return $a + $b;
			}
		}

		class B extends A {
			function bar() {}
		}

		$methodInfo = new MethodReflection('B', 'foo');
		$this->assertEqual( new Nette\Reflection\ClassReflection('A'), $methodInfo->getDeclaringClass() );


		$this->assertNull( $methodInfo->getExtension() );


		$this->assertSame( 23, $methodInfo->callback->invoke(20, 3) );
	}

}
