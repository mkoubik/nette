<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugLoggingWarningsTest extends TestCase
{

	/**
	 * Nette\Debug notices and warnings logging.
	 */
	public function testNetteDebugNoticesAndWarningsLogging()
	{
		// Setup environment
		$_SERVER['HTTP_HOST'] = 'nette.org';

		$errorLog = __DIR__ . '/log/php_error.log';
		$this->purge(dirname($errorLog));

		Debug::$consoleMode = FALSE;
		Debug::$mailer = 'testMailer';

		Debug::enable(Debug::PRODUCTION, $errorLog, 'admin@example.com');

		function testMailer() {}


		// throw error
		$a++;

		$this->assertMatch('%a%PHP Notice: Undefined variable: a in %a%', file_get_contents(dirname($errorLog) . '/php_error.log'));
		$this->assertTrue(is_file(dirname($errorLog) . '/php_error.log.email-sent'));
	}

}
