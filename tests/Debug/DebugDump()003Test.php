<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugDump003Test extends TestCase
{

	/**
	 * Nette\Debug::dump() in production mode.
	 */
	public function testNetteDebugDumpInProductionMode()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = TRUE;


		ob_start();
		Debug::dump('sensitive data');
		$this->assertSame( '', ob_get_clean() );

		$this->assertMatch( '<pre class="nette-dump">"forced" (6)
		</pre>', Debug::dump('forced', TRUE) );
	}

}
