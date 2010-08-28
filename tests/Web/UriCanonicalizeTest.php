<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriCanonicalizeTest extends TestCase
{

	/**
	 * Nette\Web\Uri canonicalize.
	 */
	public function testUriCanonicalize()
	{
		$uri = new Uri('http://hostname/path?arg=value&arg2=v%20a%26l%3Du%2Be');
		$this->assertSame( 'arg=value&arg2=v%20a%26l%3Du%2Be',  $uri->query );

		$uri->canonicalize();
		$this->assertSame( 'arg=value&arg2=v a%26l%3Du%2Be',  $uri->query );
	}

}
