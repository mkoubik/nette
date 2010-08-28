<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ExtensionReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class ExtensionReflectionTest extends TestCase
{

	/**
	 * ExtensionReflection tests.
	 */
	public function testExtensionReflectionTests()
	{
		$ext = new ExtensionReflection('standard');
		$funcs = $ext->getFunctions();
		$this->assertEqual( new Nette\Reflection\FunctionReflection('sleep'), $funcs['sleep'] );



		$ext = new ExtensionReflection('reflection');
		$this->assertEqual( array(
			'ReflectionException' => new Nette\Reflection\ClassReflection('ReflectionException'),
			'Reflection' => new Nette\Reflection\ClassReflection('Reflection'),
			'Reflector' => new Nette\Reflection\ClassReflection('Reflector'),
			'ReflectionFunctionAbstract' => new Nette\Reflection\ClassReflection('ReflectionFunctionAbstract'),
			'ReflectionFunction' => new Nette\Reflection\ClassReflection('ReflectionFunction'),
			'ReflectionParameter' => new Nette\Reflection\ClassReflection('ReflectionParameter'),
			'ReflectionMethod' => new Nette\Reflection\ClassReflection('ReflectionMethod'),
			'ReflectionClass' => new Nette\Reflection\ClassReflection('ReflectionClass'),
			'ReflectionObject' => new Nette\Reflection\ClassReflection('ReflectionObject'),
			'ReflectionProperty' => new Nette\Reflection\ClassReflection('ReflectionProperty'),
			'ReflectionExtension' => new Nette\Reflection\ClassReflection('ReflectionExtension'),
		), $ext->getClasses() );
	}

}
