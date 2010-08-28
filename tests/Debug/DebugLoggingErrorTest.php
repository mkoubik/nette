<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugLoggingErrorTest extends TestCase
{

	/**
	 * Nette\Debug error logging.
	 */
	public function testNetteDebugErrorLogging()
	{
		// Setup environment
		$_SERVER['HTTP_HOST'] = 'nette.org';

		$errorLog = __DIR__ . '/log/php_error.log';
		$this->purge(dirname($errorLog));

		Debug::$consoleMode = FALSE;
		Debug::$mailer = 'testMailer';

		Debug::enable(Debug::PRODUCTION, $errorLog, 'admin@example.com');

		function testMailer() {}

		function shutdown() {
			global $errorLog;
			$this->assertMatch('%a%PHP Fatal error: Uncaught exception FatalErrorException with message \'Call to undefined function missing_funcion()\' in %a%', file_get_contents(dirname($errorLog) . '/php_error.log'));
			$this->assertTrue(is_file(dirname($errorLog) . '/php_error.log.email-sent'));
			die(0);
		}
		$this->assertHandler('shutdown');



		missing_funcion();
	}

}
