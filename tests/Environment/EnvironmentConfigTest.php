<?php

/**
 * Nette Framework test
 */

use Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class EnvironmentConfigTest extends TestCase
{

	/**
	 * Nette\Environment configuration.
	 */
	public function testNetteEnvironmentConfiguration()
	{
		class Factory
		{
			static function createService($options)
			{
				$this->note( 'Factory::createService', __METHOD__ );
				$this->assertSame( array('anyValue' => 'hello world'), $options );
				return (object) NULL;
			}
		}

		Environment::setName(Environment::PRODUCTION);
		Environment::loadConfig('config.ini');
		$this->assertSame(array('Factory::createService'), $this->fetchNotes());

		$this->assertSame( 'hello world', Environment::getVariable('foo') );

		$this->assertSame( 'hello world', constant('HELLO_WORLD') );

		$this->assertSame( array(
			'mbstring-internal_encoding' => 'UTF-8',
			'date.timezone' => 'Europe/Prague',
			'iconv.internal_encoding' => 'UTF-8',
		), Environment::getConfig('php')->toArray() );

		$this->assertSame( array(
			'adapter' => 'pdo_mysql',
			'params' => array(
				'host' => 'db.example.com',
				'username' => 'dbuser',
				'password' => 'secret',
				'dbname' => 'dbname',
			),
		), Environment::getConfig('database')->toArray() );

		$this->assertTrue( Environment::isProduction() );
	}

}
