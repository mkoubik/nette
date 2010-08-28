<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugE_ERRORHtmlTest extends TestCase
{

	/**
	 * Nette\Debug E_ERROR in HTML.
	 */
	public function testNetteDebugEERRORInHTML()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertMatch(file_get_contents(__DIR__ . '/Debug.E_ERROR.html.expect'), ob_get_clean());
			die(0);
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
			missing_funcion();
		}


		first(10, 'any string');
	}

}
