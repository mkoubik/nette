<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class DummyStorageTest extends TestCase
{

	/**
	 * Nette\Caching\DummyStorage test.
	 */
	public function testDummyStorageTest()
	{
		// key and data with special chars
		$key = 'nette';
		$value = '"Hello World"';

		$cache = new Cache(new Nette\Caching\DummyStorage, 'myspace');


		$this->assertFalse( isset($cache[$key]), 'Is cached?' );

		$this->assertNull( $cache[$key], 'Cache content:' );


		// Writing cache...
		$cache[$key] = $value;
		$cache->release();

		$this->assertFalse( isset($cache[$key]), 'Is cached?' );

		$this->assertFalse( $cache[$key] === $value, 'Is cache ok?' );


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
