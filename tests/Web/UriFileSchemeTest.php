<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriFileSchemeTest extends TestCase
{

	/**
	 * Nette\Web\Uri file://
	 */
	public function testUriFile()
	{
		$uri = new Uri('file://localhost/D:/dokumentace/rfc3986.txt');
		$this->assertSame( 'file://localhost/D:/dokumentace/rfc3986.txt',  (string) $uri );
		$this->assertSame( 'file',  $uri->scheme );
		$this->assertSame( '',  $uri->user );
		$this->assertSame( '',  $uri->password );
		$this->assertSame( 'localhost',  $uri->host );
		$this->assertNull( $uri->port );
		$this->assertSame( '/D:/dokumentace/rfc3986.txt',  $uri->path );
		$this->assertSame( '',  $uri->query );
		$this->assertSame( '',  $uri->fragment );


		$uri = new Uri('file:///D:/dokumentace/rfc3986.txt');
		$this->assertSame( 'file://D:/dokumentace/rfc3986.txt',  (string) $uri );
		$this->assertSame( 'file',  $uri->scheme );
		$this->assertSame( '',  $uri->user );
		$this->assertSame( '',  $uri->password );
		$this->assertSame( '',  $uri->host );
		$this->assertNull( $uri->port );
		$this->assertSame( 'D:/dokumentace/rfc3986.txt',  $uri->path );
		$this->assertSame( '',  $uri->query );
		$this->assertSame( '',  $uri->fragment );
	}

}
