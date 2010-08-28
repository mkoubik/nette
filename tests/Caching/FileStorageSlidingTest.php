<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageSlidingTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage sliding expiration test.
	 */
	public function testFileStorageSlidingExpirationTest()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');


		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::EXPIRE => time() + 2,
			Cache::SLIDING => TRUE,
		));


		for($i = 0; $i < 3; $i++) {
			// Sleeping 1 second
			sleep(1);
			clearstatcache();
			$cache->release();
			$this->assertTrue( isset($cache[$key]), 'Is cached?' );

		}

		// Sleeping few seconds...
		sleep(3);
		clearstatcache();
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
