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
class ParameterReflection53Test extends TestCase
{

	/**
	 * ParameterReflection tests.
	 */
	public function testParameterReflectionTests()
	{
		$reflect = new FunctionReflection(function ($x, $y) {});
		$params = $reflect->getParameters();
		$this->assertSame( 2, count($params) );
		$this->assertSame( 'Function {closure}()', (string) $params[0]->declaringFunction );
		$this->assertNull( $params[0]->class );
		$this->assertNull( $params[0]->declaringClass );
		$this->assertSame( 'Function {closure}()', (string) $params[1]->declaringFunction );
		$this->assertNull( $params[1]->class );
		$this->assertNull( $params[1]->declaringClass );
	}

}
