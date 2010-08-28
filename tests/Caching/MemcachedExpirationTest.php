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
class MemcachedExpirationTest extends TestCase
{

	/**
	 * Nette\Caching\Memcached expiration test.
	 */
	public function testMemcachedExpirationTest()
	{
		if (!MemcachedStorage::isAvailable()) {
			$this->skip('Requires PHP extension Memcache.');
		}



		$key = 'nette';
		$value = 'rulez';

		$cache = new Cache(new MemcachedStorage('localhost'));


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::EXPIRE => time() + 3,
		));


		// Sleeping 1 second
		sleep(1);
		$cache->release();
		$this->assertTrue( isset($cache[$key]), 'Is cached?' );



		// Sleeping 3 seconds
		sleep(3);
		$cache->release();
		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
