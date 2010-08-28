<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ClassReflection,
	Nette\Reflection\FunctionReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class ParameterReflectionTest extends TestCase
{

	/**
	 * ParameterReflection tests.
	 */
	public function testParameterReflectionTests()
	{
		function myFunction($test, $test2 = null) {
			echo $test;
		}

		$reflect = new FunctionReflection('myFunction');
		$params = $reflect->getParameters();
		$this->assertSame( 2, count($params) );
		$this->assertSame( 'Function myFunction()', (string) $params[0]->declaringFunction );
		$this->assertNull( $params[0]->class );
		$this->assertNull( $params[0]->declaringClass );
		$this->assertSame( 'Function myFunction()', (string) $params[1]->declaringFunction );
		$this->assertNull( $params[1]->class );
		$this->assertNull( $params[1]->declaringClass );



		class Foo
		{
			function myMethod($test, $test2 = null)
			{
				echo $test;
			}
		}

		$reflect = new ClassReflection('Foo');
		$params = $reflect->getMethod('myMethod')->getParameters();
		$this->assertSame( 2, count($params) );
		$this->assertSame( 'Method Foo::myMethod()', (string) $params[0]->declaringFunction );
		$this->assertNull( $params[0]->class );
		$this->assertSame( 'Class Foo', (string) $params[0]->declaringClass );
		$this->assertSame( 'Method Foo::myMethod()', (string) $params[1]->declaringFunction );
		$this->assertNull( $params[1]->class );
		$this->assertSame( 'Class Foo', (string) $params[1]->declaringClass );
	}

}
