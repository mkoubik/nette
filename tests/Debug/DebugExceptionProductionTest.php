<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugExceptionProductionTest extends TestCase
{

	/**
	 * Nette\Debug exception in production mode.
	 */
	public function testNetteDebugExceptionInProductionMode()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = TRUE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertMatch('%A%<h1>Server Error</h1>%A%', ob_get_clean());
		}
		$this->assertHandler('shutdown');



		throw new Exception('The my exception', 123);
	}

}
