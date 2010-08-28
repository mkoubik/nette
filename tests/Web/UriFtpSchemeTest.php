<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriFtpSchemeTest extends TestCase
{

	/**
	 * Nette\Web\Uri ftp://
	 */
	public function testUriFtp()
	{
		$uri = new Uri('ftp://ftp.is.co.za/rfc/rfc3986.txt');

		$this->assertSame( 'ftp',  $uri->scheme );
		$this->assertSame( '',  $uri->user );
		$this->assertSame( '',  $uri->password );
		$this->assertSame( 'ftp.is.co.za',  $uri->host );
		$this->assertSame( 21,  $uri->port );
		$this->assertSame( '/rfc/rfc3986.txt',  $uri->path );
		$this->assertSame( '',  $uri->query );
		$this->assertSame( '',  $uri->fragment );
		$this->assertSame( 'ftp.is.co.za',  $uri->authority );
		$this->assertSame( 'ftp://ftp.is.co.za',  $uri->hostUri );
		$this->assertSame( 'ftp://ftp.is.co.za/rfc/rfc3986.txt',  $uri->absoluteUri );
	}

}
