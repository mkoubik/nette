<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageFilesTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage files dependency test.
	 */
	public function testFileStorageFilesDependencyTest()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');

		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));


		$dependentFile = __DIR__ . '/tmp' . '/spec.file';
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
