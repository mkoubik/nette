<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugE_RECOVERABLE_ERRORTest extends TestCase
{

	/**
	 * Nette\Debug E_RECOVERABLE_ERROR error.
	 */
	public function testNetteDebugERECOVERABLEERRORError()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;

		Debug::enable();



		class TestClass
		{

			function test1(array $val)
			{
			}


			function test2(TestClass $val)
			{
			}


			function __toString()
			{
				return FALSE;
			}


		}


		$obj = new TestClass;

		try {
			// Invalid argument #1
			$obj->test1('hello');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('FatalErrorException', 'Argument 1 passed to TestClass::test1() must be an array, string given, called in %a%', $e );
		}

		try {
			// Invalid argument #2
			$obj->test2('hello');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('FatalErrorException', 'Argument 1 passed to TestClass::test2() must be an instance of TestClass, string given, called in %a%', $e );
		}

		try {
			// Invalid toString
			echo $obj;
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('FatalErrorException', 'Method TestClass::__toString() must return a string value', $e );
		}
	}

}
