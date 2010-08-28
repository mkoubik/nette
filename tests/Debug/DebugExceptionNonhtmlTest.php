<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugExceptionNonhtmlTest extends TestCase
{

	/**
	 * Nette\Debug exception in non-HTML mode.
	 */
	public function testNetteDebugExceptionInNonHTMLMode()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		header('Content-Type: text/plain');

		Debug::enable();

		function shutdown() {
			$this->assertSame('', ob_get_clean());
		}
		$this->assertHandler('shutdown');



		throw new Exception('The my exception', 123);
	}

}
