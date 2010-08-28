<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class MemcachedTagsTest extends TestCase
{

	/**
	 * Nette\Caching\MemcachedStorage tags dependency test.
	 */
	public function testMemcachedStorageTagsDependencyTest()
	{
		if (!Nette\Caching\MemcachedStorage::isAvailable()) {
			$this->skip('Requires PHP extension Memcache.');
		}


		// temporary directory
		Nette\Environment::setVariable('tempDir', __DIR__ . '/tmp');
		$this->purge(__DIR__ . '/tmp');



		$storage = new Nette\Caching\MemcachedStorage('localhost');
		$cache = new Cache($storage);


		// Writing cache...
		$cache->save('key1', 'value1', array(
			Cache::TAGS => array('one', 'two'),
		));

		$cache->save('key2', 'value2', array(
			Cache::TAGS => array('one', 'three'),
		));

		$cache->save('key3', 'value3', array(
			Cache::TAGS => array('two', 'three'),
		));

		$cache['key4'] = 'value4';


		// Cleaning by tags...
		$cache->clean(array(
			Cache::TAGS => 'one',
		));

		$this->assertFalse( isset($cache['key1']), 'Is cached key1?' );
		$this->assertFalse( isset($cache['key2']), 'Is cached key2?' );
		$this->assertTrue( isset($cache['key3']), 'Is cached key3?' );
		$this->assertTrue( isset($cache['key4']), 'Is cached key4?' );
	}

}
