<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugE_ERRORProductionTest extends TestCase
{

	/**
	 * Nette\Debug E_ERROR in production mode.
	 */
	public function testNetteDebugEERRORInProductionMode()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = TRUE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertMatch('%A%<h1>Server Error</h1>%A%', ob_get_clean());
			die(0);
		}
		$this->assertHandler('shutdown');



		missing_funcion();
	}

}
