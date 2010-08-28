<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ClassReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class AnnotationsCommentParsing2Test extends TestCase
{

	/**
	 * Annotations comment parser II.
	 */
	public function testAnnotationsCommentParserII()
	{
		/**
		 * @one( value), out
		 * @two (value)
		 * @three(
		 * @4th
		 * @five
		 * @brackets( single = '()@\'"', double = "()@'\"")
		 * @line1() @line2 @line3 value @line4
		 */
		class TestClass1 {
		}

		/** @one(value)*/
		class TestClass2 {
		}

		/** @one*/
		class TestClass3 {
		}


		$rc = new ClassReflection('TestClass1');
		$this->assertEqual( array(
			'one' => array('value'),
			'two' => array('value'),
			'three' => array(TRUE),
			'five' => array(TRUE),
			'brackets' => array(
				new ArrayObject(array(
					'single' => "()@'\"",
					'double' => "()@'\"",
				)),
			),
			'line1' => array(TRUE),
			'line2' => array(TRUE),
			'line3' => array('value'),
			'line4' => array(TRUE),
		), $rc->getAnnotations() );


		$rc = new ClassReflection('TestClass2');
		$this->assertSame( array(
			'one' => array('value'),
		), $rc->getAnnotations() );


		$rc = new ClassReflection('TestClass3');
		$this->assertSame( array(
			'one' => array(TRUE),
		), $rc->getAnnotations() );
	}

}
