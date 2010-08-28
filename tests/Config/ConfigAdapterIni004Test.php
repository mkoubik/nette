<?php

/**
 * Nette Framework test
 */

use Nette\Config\Config;




/**
 * @package    Nette\Config
 * @subpackage UnitTests
 */
class ConfigAdapterIni004Test extends TestCase
{

	/**
	 * Nette\Config\ConfigAdapterIni section.
	 */
	public function testConfigAdapterIniSection()
	{
		try {
			$config = Config::fromFile('config3.ini');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'InvalidStateException', "Missing parent section [scalar] in 'config3.ini'.", $e );
		}


		try {
			$config = Config::fromFile('config4.ini');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'InvalidStateException', "Invalid section [scalar.set] in 'config4.ini'.", $e );
		}


		try {
			$config = Config::fromFile('config5.ini');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException( 'InvalidStateException', "Invalid key 'date.timezone' in section [set] in 'config5.ini'.", $e );
		}
	}

}
