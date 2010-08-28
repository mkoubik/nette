<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache,
	Nette\Environment;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageClosureTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage & Nette\Callback & Closure.
	 */
	public function testFileStorageNetteCallbackClosure()
	{
		// key and data with special chars
		$key = '../' . implode('', range("\x00", "\x1F"));
		$value = range("\x00", "\xFF");

		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Environment::setVariable('tempDir', __DIR__ . '/tmp');



		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );


		// Writing cache using Closure...
		$res = $cache->save($key, function() use ($value) {
			return $value;
		});
		$cache->release();

		$this->assertTrue( $res === $value, 'Is result ok?' );

		$this->assertTrue( $cache[$key] === $value, 'Is cache ok?' );


		// Removing from cache using unset()...
		unset($cache[$key]);
		$cache->release();

		// Writing cache using Nette\Callback...
		$res = $cache->save($key, callback(function() use ($value) {
			return $value;
		}));
		$cache->release();

		$this->assertTrue( $res === $value, 'Is result ok?' );

		$this->assertTrue( $cache[$key] === $value, 'Is cache ok?' );


		// Removing from cache using NULL callback...
		$cache->save($key, function() {
			return NULL;
		});
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
