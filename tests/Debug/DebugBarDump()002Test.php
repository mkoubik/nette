<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugBarDump002Test extends TestCase
{

	/**
	 * Nette\Debug::barDump() with showLocation.
	 */
	public function testNetteDebugBarDumpWithShowLocation()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;
		Debug::$showLocation = TRUE;
		header('Content-Type: text/html');

		Debug::enable();

		function shutdown() {
			$this->assertMatch(<<<EOD
		%A%<h1>Dumped variables</h1> <div class="nette-inner"> <table> <tr class=""> <th></th> <td><pre class="nette-dump">"value" (5)
		</pre> </td> </tr> </table> </div> </div>%A%
		EOD
		, ob_get_clean());
		}
		$this->assertHandler('shutdown');



		Debug::barDump('value');
	}

}
