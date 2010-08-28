<?php

/**
 * Nette Framework test
 */

use Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class EnvironmentModeTest extends TestCase
{

	/**
	 * Nette\Environment modes.
	 */
	public function testNetteEnvironmentModes()
	{
		$this->assertFalse( Environment::isConsole(), 'Is console?' );


		$this->assertTrue( Environment::isProduction(), 'Is production mode?' );


		// Setting my mode...
		Environment::setMode('myMode', 123);

		$this->assertTrue( Environment::getMode('myMode'), 'Is enabled?' );
	}

}
