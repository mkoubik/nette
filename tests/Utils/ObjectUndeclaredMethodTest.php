<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectUndeclaredMethodTest extends TestCase
{

	/**
	 * Nette\Object undeclared method.
	 */
	public function testNetteObjectUndeclaredMethod()
	{
		require __DIR__ . '/Object.inc';



		try {
			$obj = new TestClass;
			$obj->undeclared();

			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('MemberAccessException', 'Call to undefined method TestClass::undeclared().', $e );
		}
	}

}
