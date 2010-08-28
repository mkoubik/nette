<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageConst001Test extends TestCase
{

	/**
	 * Nette\Caching\FileStorage constant dependency test.
	 */
	public function testFileStorageConstantDependencyTest()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');


		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		define('ANY_CONST', 10);


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::CONSTS => 'ANY_CONST',
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );
	}

}
