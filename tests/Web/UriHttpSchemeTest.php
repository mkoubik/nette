<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriHttpSchemeTest extends TestCase
{

	/**
	 * Nette\Web\Uri http://
	 */
	public function testUriHttp()
	{
		$uri = new Uri('http://username:password@hostname:60/path?arg=value#anchor');

		$this->assertSame( 'http://hostname:60/path?arg=value#anchor',  (string) $uri );
		$this->assertSame( 'http',  $uri->scheme );
		$this->assertSame( 'username',  $uri->user );
		$this->assertSame( 'password',  $uri->password );
		$this->assertSame( 'hostname',  $uri->host );
		$this->assertSame( 60,  $uri->port );
		$this->assertSame( '/path',  $uri->path );
		$this->assertSame( 'arg=value',  $uri->query );
		$this->assertSame( 'anchor',  $uri->fragment );
		$this->assertSame( 'hostname:60',  $uri->authority );
		$this->assertSame( 'http://hostname:60',  $uri->hostUri );
		$this->assertSame( 'http://hostname:60/path?arg=value#anchor',  $uri->absoluteUri );
	}

}
