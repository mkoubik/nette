<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugExceptionProductionConsoleTest extends TestCase
{

	/**
	 * Nette\Debug exception in production & console mode.
	 */
	public function testNetteDebugExceptionInProductionConsoleMode()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = TRUE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch('ERROR:%A%', ob_get_clean());
		}
		$this->assertHandler('shutdown');



		throw new Exception('The my exception', 123);
	}

}
