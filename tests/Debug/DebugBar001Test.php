<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugBar001Test extends TestCase
{

	/**
	 * Nette\Debug Bar in HTML.
	 */
	public function testNetteDebugBarInHTML()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertMatch('%A%<div id="nette-debug">%A%', ob_get_clean());
		}
		$this->assertHandler('shutdown');
	}

}
