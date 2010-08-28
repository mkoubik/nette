<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageExpirationTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage expiration test.
	 */
	public function testFileStorageExpirationTest()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');

		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::EXPIRE => time() + 3,
		));


		// Sleeping 1 second
		sleep(1);
		clearstatcache();
		$cache->release();
		$this->assertTrue( isset($cache[$key]), 'Is cached?' );



		// Sleeping 3 seconds
		sleep(3);
		clearstatcache();
		$cache->release();
		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
