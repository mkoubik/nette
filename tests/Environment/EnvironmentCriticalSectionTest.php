<?php

/**
 * Nette Framework test
 */

use Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class EnvironmentCriticalSectionTest extends TestCase
{

	/**
	 * Nette\Environment critical sections.
	 */
	public function testNetteEnvironmentCriticalSections()
	{
		$key = '../' . implode('', range("\x00", "\x1F"));

		// temporary directory
		Environment::setVariable('tempDir', __DIR__ . '/tmp');
		$this->purge(__DIR__ . '/tmp');


		// entering
		Environment::enterCriticalSection($key);

		// leaving
		Environment::leaveCriticalSection($key);

		try {
			// leaving not entered
			Environment::leaveCriticalSection('notEntered');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', 'Critical section has not been initialized.', $e );
		}
	}

}
