<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugE_ERRORConsoleTest extends TestCase
{

	/**
	 * Nette\Debug E_ERROR in console.
	 */
	public function testNetteDebugEERRORInConsole()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch("
		Fatal error: Call to undefined function missing_funcion() in %a%
		exception 'FatalErrorException' with message 'Call to undefined function missing_funcion()' in %a%
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
			missing_funcion();
		}


		first(10, 'any string');
	}

}
