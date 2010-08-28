<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageCallbacksTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage callbacks dependency.
	 */
	public function testFileStorageCallbacksDependency()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');



		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		function dependency($val)
		{
			return $val;
		}


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::CALLBACKS => array(array('dependency', 1)),
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );



		// Writing cache...
		$cache->save($key, $value, array(
			Cache::CALLBACKS => array(array('dependency', 0)),
		));
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
