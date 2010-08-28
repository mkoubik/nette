<?php

/**
 * Nette Framework test
 */

use Nette\Config\Config;




/**
 * @package    Nette\Config
 * @subpackage UnitTests
 */
class ConfigAdapterIni002Test extends TestCase
{

	/**
	 * Nette\Config\ConfigAdapterIni section.
	 */
	public function testConfigAdapterIniSection()
	{
		$config = Config::fromFile('config1.ini', 'development');
		$this->assertEqual( new Nette\Config\Config(array(
			'database' => new Nette\Config\Config(array(
				'params' => new Nette\Config\Config(array(
					'host' => 'dev.example.com',
					'username' => 'devuser',
					'password' => 'devsecret',
					'dbname' => 'dbname',
				)),
				'adapter' => 'pdo_mysql',
			)),
			'timeout' => '10',
			'display_errors' => '1',
			'html_errors' => '',
			'items' => new Nette\Config\Config(array(
				'0' => '10',
				'1' => '20',
			)),
			'webname' => 'the example',
		)), $config );
	}

}
