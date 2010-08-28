<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugScreamTest extends TestCase
{

	/**
	 * Nette\Debug notices and warnings in scream mode.
	 */
	public function testNetteDebugNoticesAndWarningsInScreamMode()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;
		Debug::$scream = TRUE;

		Debug::enable();

		function shutdown() {
			$this->assertMatch('
		Strict Standards: mktime(): You should be using the time() function instead in %a% on line %d%

		Deprecated: mktime(): The is_dst parameter is deprecated in %a% on line %d%

		Notice: Undefined variable: x in %a% on line %d%

		Warning: rename(..,..): %A% in %a% on line %d%
		', ob_get_clean());
		}
		$this->assertHandler('shutdown');



		@mktime(); // E_STRICT
		@mktime(0, 0, 0, 1, 23, 1978, 1); // E_DEPRECATED
		@$x++; // E_NOTICE
		@rename('..', '..'); // E_WARNING
		@require 'E_COMPILE_WARNING.inc'; // E_COMPILE_WARNING (not working)
	}

}
