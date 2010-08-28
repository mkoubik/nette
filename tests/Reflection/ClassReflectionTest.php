<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ClassReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class ClassReflectionTest extends TestCase
{

	/**
	 * ClassReflection tests.
	 */
	public function testClassReflectionTests()
	{
		class Foo
		{
			public function f() {}
		}

		class Bar extends Foo implements \Countable
		{
			public $var;

			function count() {}
		}


		$this->assertEqual( new Nette\Reflection\ClassReflection('Bar'), ClassReflection::from('Bar') );
		$this->assertEqual( new Nette\Reflection\ClassReflection('Bar'), ClassReflection::from(new Bar) );



		$rc = ClassReflection::from('Bar');

		$this->assertNull( $rc->getExtension() );


		$this->assertEqual( array(
			'Countable' => new Nette\Reflection\ClassReflection('Countable'),
		), $rc->getInterfaces() );


		$this->assertEqual( new Nette\Reflection\ClassReflection('Foo'), $rc->getParentClass() );


		$this->assertNull( $rc->getConstructor() );


		$this->assertEqual( new Nette\Reflection\MethodReflection('Foo', 'f'), $rc->getMethod('f') );


		try {
			$rc->getMethod('doesntExist');
		} catch (Exception $e) {
			$this->assertSame( 'Method Bar::doesntExist() does not exist', $e->getMessage() );

		}

		$this->assertEqual( array(
			new Nette\Reflection\MethodReflection('Bar', 'count'),
			new Nette\Reflection\MethodReflection('Foo', 'f'),
		), $rc->getMethods() );



		$this->assertEqual( new Nette\Reflection\PropertyReflection('Bar', 'var'), $rc->getProperty('var') );


		try {
			$rc->getProperty('doesntExist');
		} catch (exception $e) {
			$this->assertSame( 'Property Bar::$doesntExist does not exist', $e->getMessage() );

		}

		$this->assertEqual( array(
			new Nette\Reflection\PropertyReflection('Bar', 'var'),
		), $rc->getProperties() );
	}

}
