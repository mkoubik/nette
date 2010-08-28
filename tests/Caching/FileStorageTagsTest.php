<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageTagsTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage tags dependency test.
	 */
	public function testFileStorageTagsDependencyTest()
	{
		// temporary directory
		Nette\Environment::setVariable('tempDir', __DIR__ . '/tmp');
		$this->purge(__DIR__ . '/tmp');



		$storage = new Nette\Caching\FileStorage(__DIR__ . '/tmp');
		$cache = new Cache($storage);


		// Writing cache...
		$cache->save('key1', 'value1', array(
			Cache::TAGS => array('one', 'two'),
		));

		$cache->save('key2', 'value2', array(
			Cache::TAGS => array('one', 'three'),
		));

		$cache->save('key3', 'value3', array(
			Cache::TAGS => array('two', 'three'),
		));

		$cache['key4'] = 'value4';


		// Cleaning by tags...
		$cache->clean(array(
			Cache::TAGS => 'one',
		));

		$this->assertFalse( isset($cache['key1']), 'Is cached key1?' );
		$this->assertFalse( isset($cache['key2']), 'Is cached key2?' );
		$this->assertTrue( isset($cache['key3']), 'Is cached key3?' );
		$this->assertTrue( isset($cache['key4']), 'Is cached key4?' );
	}

}
