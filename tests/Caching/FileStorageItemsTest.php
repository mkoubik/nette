<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageItemsTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage items dependency test.
	 */
	public function testFileStorageItemsDependencyTest()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');


		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::ITEMS => array('dependent'),
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );


		// Modifing dependent cached item
		$cache['dependent'] = 'hello world';
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::ITEMS => 'dependent',
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );


		// Modifing dependent cached item
		sleep(2);
		$cache['dependent'] = 'hello europe';
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::ITEMS => 'dependent',
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );


		// Deleting dependent cached item
		$cache['dependent'] = NULL;
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
