<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugFireLogProductionTest extends TestCase
{

	/**
	 * Nette\Debug::fireLog() in production mode.
	 */
	public function testNetteDebugFireLogInProductionMode()
	{
		// Setup environment
		$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 Gecko/2008070208 Firefox/3.0.1 FirePHP/0.1.0.3';

		Debug::$consoleMode = FALSE;
		Debug::$productionMode = TRUE;


		Debug::fireLog('Sensitive log');

		flush();

		$this->assertFalse(strpos(implode('', headers_list()), 'X-Wf-'));
	}

}
