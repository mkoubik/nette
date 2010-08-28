<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugE_COMPILE_ERRORConsoleTest extends TestCase
{

	/**
	 * Nette\Debug error in console.
	 */
	public function testNetteDebugErrorInConsole()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch("
		Fatal error: Cannot re-assign \$this in %a%
		exception 'FatalErrorException' with message 'Cannot re-assign \$this' in %a%
		Stack trace:
		#0 [internal function]: %ns%Debug::_shutdownHandler()
		#1 {main}
		", ob_get_clean());
			die(0);
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
			require 'E_COMPILE_ERROR.inc';
		}


		first(10, 'any string');
	}

}
