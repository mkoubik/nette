<?php

/**
 * Nette Framework test
 */

use Nette\Loaders\NetteLoader;




/**
 * @package    Nette\Loaders
 * @subpackage UnitTests
 */
class NetteLoaderTest extends TestCase
{

	/**
	 * Nette\Loaders\NetteLoader basic usage.
	 */
	public function testNetteLoaderBasicUsage()
	{
		$loader = NetteLoader::getInstance();
		$loader->register();

		$this->assertTrue( class_exists('Nette\Debug'), 'Class Nette\Debug loaded?' );
	}

}
