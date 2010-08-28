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
class MemcachedFilesTest extends TestCase
{

	/**
	 * Nette\Caching\Memcached files dependency test.
	 */
	public function testMemcachedFilesDependencyTest()
	{
		if (!MemcachedStorage::isAvailable()) {
			$this->skip('Requires PHP extension Memcache.');
		}



		$key = 'nette';
		$value = 'rulez';

		$cache = new Cache(new MemcachedStorage('localhost'));


		$dependentFile = __DIR__ . '/tmp/spec.file';
		@unlink($dependentFile);

		// Writing cache...
		$cache->save($key, $value, array(
			Cache::FILES => array(
				__FILE__,
				$dependentFile,
			),
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );


		// Modifing dependent file
		file_put_contents($dependentFile, 'a');
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );


		// Writing cache...
		$cache->save($key, $value, array(
			Cache::FILES => $dependentFile,
		));
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );


		// Modifing dependent file
		sleep(2);
		file_put_contents($dependentFile, 'b');
		clearstatcache();
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
