<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageConst002Test extends TestCase
{

	/**
	 * Nette\Caching\FileStorage constant dependency test (continue...).
	 */
	public function testFileStorageConstantDependencyTestContinue()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory


		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		// Deleting dependent const

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
