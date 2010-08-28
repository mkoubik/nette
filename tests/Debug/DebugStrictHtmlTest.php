<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugStrictHtmlTest extends TestCase
{

	/**
	 * Nette\Debug notices and warnings with $strictMode in HTML.
	 */
	public function testNetteDebugNoticesAndWarningsWithStrictModeInHTML()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		header('Content-Type: text/html');

		Debug::$strictMode = TRUE;
		Debug::enable();

		function shutdown() {
			$this->assertMatch(file_get_contents(__DIR__ . '/Debug.strict.html.expect'), ob_get_clean());
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
			$x++;
		}


		first(10, 'any string');

		// after



		__halt_compiler() ?>

		---EXPECTHEADERS---
		Status: 500 Internal Server Error
	}

}
