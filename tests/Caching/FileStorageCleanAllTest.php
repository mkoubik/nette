<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class FileStorageCleanAllTest extends TestCase
{

	/**
	 * Nette\Caching\FileStorage clean with Cache::ALL
	 */
	public function testFileStorageCleanWithCacheALL()
	{
		// temporary directory
		Nette\Environment::setVariable('tempDir', __DIR__ . '/tmp');

		$storage = new Nette\Caching\FileStorage(__DIR__ . '/tmp');
		$cacheA = new Cache($storage);
		$cacheB = new Cache($storage,'B');

		$cacheA['test1'] = 'David';
		$cacheA['test2'] = 'Grudl';
		$cacheB['test1'] = 'divaD';
		$cacheB['test2'] = 'ldurG';

		$this->assertSame( 'David Grudl divaD ldurG', implode(' ',array(
			$cacheA['test1'],
			$cacheA['test2'],
			$cacheB['test1'],
			$cacheB['test2'],
		)));

		$storage->clean(array(Cache::ALL => TRUE));

		$this->assertNull( $cacheA['test1'] );

		$this->assertNull( $cacheA['test2'] );

		$this->assertNull( $cacheB['test1'] );

		$this->assertNull( $cacheB['test2'] );
	}

}
