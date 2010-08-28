<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugBar003Test extends TestCase
{

	/**
	 * Nette\Debug Bar in production mode.
	 */
	public function testNetteDebugBarInProductionMode()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = TRUE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertSame('', ob_get_clean());
		}
		$this->assertHandler('shutdown');
	}

}
