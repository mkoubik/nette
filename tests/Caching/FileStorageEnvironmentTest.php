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
class FileStorageEnvironmentTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage and Environment.
	 */
	public function testFileStorageAndEnvironment()
	{
		// key and data with special chars
		$key = '../' . implode('', range("\x00", "\x1F"));
		$value = range("\x00", "\xFF");

		// temporary directory
		$this->purge(__DIR__ . '/tmp');

		Environment::setVariable('tempDir', __DIR__ . '/tmp');

		$cache = Environment::getCache();


		$this->assertFalse( isset($cache[$key]), 'Is cached?' );

		$this->assertNull( $cache[$key], 'Cache content' );


		// Writing cache...
		$cache[$key] = $value;
		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );

		$this->assertTrue( $cache[$key] === $value, 'Is cache ok?' );


		// Removing from cache using unset()...
		unset($cache[$key]);
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );


		// Removing from cache using set NULL...
		$cache[$key] = $value;
		$cache[$key] = NULL;
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );
	}

}
