<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ClassReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class AnnotationsUserClassTest extends TestCase
{

	/**
	 * Annotations using user classes.
	 */
	public function testAnnotationsUsingUserClasses()
	{
		class SecuredAnnotation extends Nette\Reflection\Annotation
		{
			public $role;
			public $level;
			public $value;
		}


		/**
		 * @secured(disabled)
		 */
		class TestClass {

			/** @secured(role = "admin", level = 2) */
			public $foo;

		}



		// Class annotations

		$rc = new ClassReflection('TestClass');
		$this->assertEqual( array(
			'secured' => array(
				new SecuredAnnotation(array(
					'role' => NULL,
					'level' => NULL,
					'value' => 'disabled',
				)),
			),
		), $rc->getAnnotations() );


		$this->assertEqual( array(
			'secured' => array(
				new SecuredAnnotation(array(
					'role' => 'admin',
					'level' => 2,
					'value' => NULL,
				)),
			),
		), $rc->getProperty('foo')->getAnnotations() );
	}

}
