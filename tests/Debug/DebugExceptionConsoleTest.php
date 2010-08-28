<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugExceptionConsoleTest extends TestCase
{

	/**
	 * Nette\Debug exception in console.
	 */
	public function testNetteDebugExceptionInConsole()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch("exception 'Exception' with message 'The my exception' in %a%
		Stack trace:
		#0 %a%: third(Array)
		#1 %a%: second(true, false)
		#2 %a%: first(10, 'any string')
		#3 {main}
		", ob_get_clean());
		}
		$this->assertHandler('shutdown');



		function first($arg1, $arg2)
		{
			second(TRUE, FALSE);
		}



		function second($arg1, $arg2)
		{
			third(array(1, 2, 3));
		}


		function third($arg1)
		{
			throw new Exception('The my exception', 123);
		}


		first(10, 'any string');
	}

}
