<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugShutupErrorTest extends TestCase
{

	/**
	 * Nette\Debug errors and shut-up operator.
	 */
	public function testNetteDebugErrorsAndShutUpOperator()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch("exception 'FatalErrorException' with message 'Call to undefined function missing_funcion()' in %a%:%d%
		Stack trace:
		#0 [internal function]: %ns%Debug::_shutdownHandler()
		#1 {main}
		", ob_get_clean());
			die(0);
		}
		$this->assertHandler('shutdown');



		@missing_funcion();
	}

}
