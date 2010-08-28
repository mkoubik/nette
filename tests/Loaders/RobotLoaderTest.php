<?php

/**
 * Nette Framework test
 */

use Nette\Loaders\RobotLoader,
	Nette\Environment;




/**
 * @package    Nette\Loaders
 * @subpackage UnitTests
 */
class RobotLoaderTest extends TestCase
{

	/**
	 * Nette\Loaders\RobotLoader basic usage.
	 */
	public function testRobotLoaderBasicUsage()
	{
		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Environment::setVariable('tempDir', __DIR__ . '/tmp');


		$loader = new RobotLoader;
		$loader->addDirectory('../../Nette/');
		$loader->addDirectory(__DIR__);
		$loader->addDirectory(__DIR__); // purposely doubled
		$loader->register();

		$this->assertTrue( class_exists('Nette\TestClass'), 'Class Nette\TestClass loaded?' );
	}

}
