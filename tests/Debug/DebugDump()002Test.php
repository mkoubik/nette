<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugDump002Test extends TestCase
{

	/**
	 * Nette\Debug::dump() with $showLocation.
	 */
	public function testNetteDebugDumpWithShowLocation()
	{
		Debug::$consoleMode = FALSE;
		Debug::$productionMode = FALSE;



		Debug::$showLocation = TRUE;

		ob_start();
		Debug::dump('xxx');
		$this->assertMatch( '<pre class="nette-dump">"xxx" (3) <small>in file %a% on line %d%</small>
		</pre>', ob_get_clean() );
	}

}
