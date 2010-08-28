<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageIntTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage int keys.
	 */
	public function testFileStorageIntKeys()
	{
		// key and data with special chars
		$key = 0;
		$value = range("\x00", "\xFF");

		// temporary directory
		$this->purge(__DIR__ . '/tmp');



		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));

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
