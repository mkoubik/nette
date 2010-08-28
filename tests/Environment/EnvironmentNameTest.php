<?php

/**
 * Nette Framework test
 */

use Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class EnvironmentNameTest extends TestCase
{

	/**
	 * Nette\Environment name.
	 */
	public function testNetteEnvironmentName()
	{
		//define('ENVIRONMENT', 'lab');

		$this->assertSame( 'production', Environment::getName(), 'Name:' );



		try {
			// Setting name:
			Environment::setName('lab2');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', 'Environment name has been already set.', $e );
		}
	}

}
