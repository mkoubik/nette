<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugE_ERRORProductionConsoleTest extends TestCase
{

	/**
	 * Nette\Debug E_ERROR in production & console mode.
	 */
	public function testNetteDebugEERRORInProductionConsoleMode()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = TRUE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch('ERROR:%A%', ob_get_clean());
			die(0);
		}
		$this->assertHandler('shutdown');



		missing_funcion();
	}

}
