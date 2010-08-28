<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugBar002Test extends TestCase
{

	/**
	 * Nette\Debug Bar in non-HTML mode.
	 */
	public function testNetteDebugBarInNonHTMLMode()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		header('Content-Type: text/plain');

		Debug::enable();

		function shutdown() {
			$this->assertSame('', ob_get_clean());
		}
		$this->assertHandler('shutdown');
	}

}
