<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\FunctionReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class FunctionReflectionTest extends TestCase
{

	/**
	 * FunctionReflection tests.
	 */
	public function testFunctionReflectionTests()
	{
		function bar() {}

		$function = new FunctionReflection('bar');
		$this->assertNull( $function->getExtension() );


		$function = new FunctionReflection('sort');
		$this->assertEqual( new Nette\Reflection\ExtensionReflection('standard'), $function->getExtension() );
	}

}
