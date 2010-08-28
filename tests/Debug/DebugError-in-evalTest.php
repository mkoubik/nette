<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugErrorInEvalTest extends TestCase
{

	/**
	 * Nette\Debug eval error in HTML.
	 */
	public function testNetteDebugEvalErrorInHTML()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertMatch(file_get_contents(__DIR__ . '/Debug.error-in-eval.expect'), ob_get_clean());
		}
		$this->assertHandler('shutdown');



		function first($user, $pass)
		{
			eval('trigger_error("The my error", E_USER_ERROR);');
		}


		first('root', 'xxx');
	}

}
