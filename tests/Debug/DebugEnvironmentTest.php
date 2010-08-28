<?php

/**
 * Nette Framework test
 */

use Nette\Debug,
	Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugEnvironmentTest extends TestCase
{

	/**
	 * Nette\Debug and Environment.
	 */
	public function testNetteDebugAndEnvironment()
	{
		Debug::$consoleMode = FALSE;



		$this->assertNull( Debug::$productionMode );

		// setting production environment...

		Environment::setMode('production', TRUE);
		Debug::enable();

		$this->assertTrue( Debug::$productionMode );
	}

}
