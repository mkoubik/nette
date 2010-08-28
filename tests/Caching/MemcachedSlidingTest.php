<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache,
	Nette\Caching\MemcachedStorage;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class MemcachedSlidingTest extends TestCase
{

	/**
	 * Nette\Caching\Memcached sliding expiration test.
	 */
	public function testMemcachedSlidingExpirationTest()
	{
		if (!MemcachedStorage::isAvailable()) {
			$this->skip('Requires PHP extension Memcache.');
		}



		$key = 'nette';
		$value = 'rulez';

		$cache = new Cache(new MemcachedStorage('localhost'));


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::EXPIRE => time() + 2,
			Cache::SLIDING => TRUE,
		));


		for($i = 0; $i < 3; $i++) {
			// Sleeping 1 second
			sleep(1);
			$cache->release();
			$this->assertTrue( isset($cache[$key]), 'Is cached?' );

		}

		// Sleeping few seconds...
		sleep(3);
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
