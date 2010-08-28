<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ClassReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class AnnotationsTest extends TestCase
{

	/**
	 * Nette\Reflection & annotations.
	 */
	public function testNetteReflectionAnnotations()
	{
		/**
		 * @author John Doe
		 * @renderable
		 */
		class TestClass {

			/** @secured */
			public $foo;

			/** @AJAX */
			public function foo()
			{}

		}



		// Class annotations

		$rc = new ClassReflection('TestClass');
		$tmp = $rc->getAnnotations();

		$this->assertSame( 'John Doe',  $tmp['author'][0] );
		$this->assertTrue( $tmp['renderable'][0] );

		$this->assertTrue( $rc->hasAnnotation('author'), "has('author')' );
		$this->assertSame( 'John Doe",  $rc->getAnnotation('author') );



		// Method annotations

		$rm = $rc->getMethod('foo');
		$tmp = $rm->getAnnotations();

		$this->assertTrue( $tmp['AJAX'][0] );
		$this->assertTrue( $rm->hasAnnotation('AJAX'), "has('AJAX')" );
		$this->assertTrue( $rm->getAnnotation('AJAX') );


		// Property annotations

		$rp = $rc->getProperty('foo');
		$tmp = $rp->getAnnotations();

		$this->assertTrue( $tmp['secured'][0] );
		$this->assertTrue( $rp->hasAnnotation('secured'), "has('secured')" );
		$this->assertTrue( $rp->getAnnotation('secured') );
	}

}
