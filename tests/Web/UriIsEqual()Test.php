<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriIsEqualTest extends TestCase
{

	/**
	 * Nette\Web\Uri::isEqual()	 
	 */
	public function testUriIsEqual()
	{
		$uri = new Uri('http://exampl%65.COM?text=foo%20bar+foo&value');
		$uri->canonicalize();
		$this->assertTrue( $uri->isEqual('http://example.com/?text=foo+bar%20foo&value') );
		$this->assertTrue( $uri->isEqual('http://example.com/?value&text=foo+bar%20foo') );
	}

}
