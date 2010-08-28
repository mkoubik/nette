<?php

/**
 * Nette Framework test
 */

use Nette\Caching\Cache;




/**
 * @package    Nette\Caching
 * @subpackage UnitTests
 */
class TemplateCacheStorageTest extends TestCase
{

	/**
	 * Nette\Caching\TemplateCacheStorage test.
	 */
	public function testTemplateCacheStorageTest()
	{
		$key = 'nette';
		$value = '<?php echo "Hello World" ?>';

		// temporary directory
		$this->purge(__DIR__ . '/tmp');



		$cache = new Cache(new Nette\Templates\TemplateCacheStorage(__DIR__ . '/tmp'));


		$this->assertFalse( isset($cache[$key]), 'Is cached?' );

		$this->assertNull( $cache[$key], 'Cache content' );

		// Writing cache...
		$cache[$key] = $value;

		$cache->release();

		$this->assertTrue( isset($cache[$key]), 'Is cached?' );

		$this->assertTrue( (bool) preg_match('#nette\.php$#', $cache[$key]['file']) );
		$this->assertTrue( is_resource($cache[$key]['handle']) );

		$var = $cache[$key];

		// Test include

		// this is impossible
		// $cache[$key] = NULL;

		ob_start();
		include $var['file'];
		$this->assertSame( 'Hello World', ob_get_clean() );

		fclose($var['handle']);
	}

}
