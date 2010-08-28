<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStoragePriorityTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage priority test.
	 */
	public function testFileStoragePriorityTest()
	{
		// temporary directory
		Nette\Environment::setVariable('tempDir', __DIR__ . '/tmp');
		$this->purge(__DIR__ . '/tmp');


		$storage = new Nette\Caching\FileStorage(__DIR__ . '/tmp');
		$cache = new Cache($storage);


		// Writing cache...
		$cache->save('key1', 'value1', array(
			Cache::PRIORITY => 100,
		));

		$cache->save('key2', 'value2', array(
			Cache::PRIORITY => 200,
		));

		$cache->save('key3', 'value3', array(
			Cache::PRIORITY => 300,
		));

		$cache['key4'] = 'value4';


		// Cleaning by priority...
		$cache->clean(array(
			Cache::PRIORITY => '200',
		));

		$this->assertFalse( isset($cache['key1']), 'Is cached key1?' );
		$this->assertFalse( isset($cache['key2']), 'Is cached key2?' );
		$this->assertTrue( isset($cache['key3']), 'Is cached key3?' );
		$this->assertTrue( isset($cache['key4']), 'Is cached key4?' );
	}

}
