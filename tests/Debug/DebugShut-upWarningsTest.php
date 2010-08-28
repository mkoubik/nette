<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugShutupWarningsTest extends TestCase
{

	/**
	 * Nette\Debug notices and warnings and shut-up operator.
	 */
	public function testNetteDebugNoticesAndWarningsAndShutUpOperator()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;

		Debug::enable();

		function shutdown() {
			$this->assertSame('', ob_get_clean());
		}
		$this->assertHandler('shutdown');



		@mktime(); // E_STRICT
		@mktime(0, 0, 0, 1, 23, 1978, 1); // E_DEPRECATED
		@$x++; // E_NOTICE
		@rename('..', '..'); // E_WARNING
		@require 'E_COMPILE_WARNING.inc'; // E_COMPILE_WARNING
	}

}
