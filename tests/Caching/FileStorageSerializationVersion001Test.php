<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




class Foo
{
}


/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageSerializationVersion001Test extends TestCase
{

	/**
	 * Nette\Caching\FileStorage @serializationVersion dependency test.
	 */
	public function testFileStorageSerializationVersionDependencyTest()
	{
		$key = 'nette';
		$value = 'rulez';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');


		$cache = new Cache(new Nette\Caching\FileStorage(__DIR__ . '/tmp'));

		// Writing cache...
		$cache->save($key, new Foo);

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );
	}

}
