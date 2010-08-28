<?php

/**
 * Nette Framework test
 */

use Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class EnvironmentVariableTest extends TestCase
{

	/**
	 * Nette\Environment variables.
	 */
	public function testNetteEnvironmentVariables()
	{
		$this->assertNull( Environment::getVariable('foo'), "Getting variable 'foo':" );


		try {
			Environment::getVariable('tempDir');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Unknown environment variable 'appDir'.", $e );
		}


		// Defining constant 'APP_DIR':
		define('APP_DIR', '/myApp');

		$this->assertSame( '/myApp', Environment::getVariable('appDir') );


		$this->assertSame( '/myApp/temp', Environment::getVariable('tempDir') );



		// Setting variable 'test'...
		Environment::setVariable('test', '%appDir%/test');

		$this->assertSame( '/myApp/test', Environment::getVariable('test') );


		$this->assertSame( array(
			'encoding' => 'UTF-8',
			'lang' => 'en',
			'cacheBase' => '/myApp/temp',
			'tempDir' => '/myApp/temp',
			'logDir' => '/myApp/log',
			'appDir' => '/myApp',
			'test' => '/myApp/test',
		), Environment::getVariables());



		try {
			// Setting circular variables...
			Environment::setVariable('bar', '%foo%');
			Environment::setVariable('foo', '%foobar%');
			Environment::setVariable('foobar', '%bar%');
			Environment::getVariable('bar');

			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', 'Circular reference detected for variables: foo, foobar, bar.', $e );
		}
	}

}
