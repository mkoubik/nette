<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageNamespaceTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage & namespace test.
	 */
	public function testFileStorageNamespaceTest()
	{
		// temporary directory
		$this->purge(__DIR__ . '/tmp');


		$storage = new Nette\Caching\FileStorage(__DIR__ . '/tmp');
		$cacheA = new Cache($storage, 'a');
		$cacheB = new Cache($storage, 'b');


		// Writing cache...
		$cacheA['key'] = 'hello';
		$cacheB['key'] = 'world';

		$this->assertTrue( isset($cacheA['key']), 'Is cached #1?' );
		$this->assertTrue( isset($cacheB['key']), 'Is cached #2?' );
		$this->assertTrue( $cacheA['key'] === 'hello', 'Is cache ok #1?' );
		$this->assertTrue( $cacheB['key'] === 'world', 'Is cache ok #2?' );


		// Removing from cache #2 using unset()...
		unset($cacheB['key']);
		$cacheA->release();
		$cacheB->release();

		$this->assertTrue( isset($cacheA['key']), 'Is cached #1?' );
		$this->assertFalse( isset($cacheB['key']), 'Is cached #2?' );
	}

}
