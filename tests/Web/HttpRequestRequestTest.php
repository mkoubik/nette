<?php

/**
 * Nette Framework test
 */

use Nette\Web\HttpRequest;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class HttpRequestRequestTest extends TestCase
{

	/**
	 * Nette\Web\HttpRequest URI.
	 */
	public function testHttpRequestURI()
	{
		// Setup environment
		$_SERVER = array(
			'HTTPS' => 'On',
			'HTTP_HOST' => 'nette.org:8080',
			'QUERY_STRING' => 'x param=val.&pa%%72am=val2&param3=v%20a%26l%3Du%2Be)',
			'REMOTE_ADDR' => '192.168.188.66',
			'REQUEST_METHOD' => 'GET',
			'REQUEST_URI' => '/file.php?x param=val.&pa%%72am=val2&param3=v%20a%26l%3Du%2Be)',
			'SCRIPT_FILENAME' => '/public_html/www/file.php',
			'SCRIPT_NAME' => '/file.php',
		);

		$request = new HttpRequest;
		$request->addUriFilter('%20', '', PHP_URL_PATH);
		$request->addUriFilter('[.,)]$');

		$this->assertSame( 'GET',  $request->getMethod() );
		$this->assertTrue( $request->isSecured() );
		$this->assertSame( '192.168.188.66',  $request->getRemoteAddress() );

		// getUri
		$this->assertSame( '/file.php',  $request->getUri()->scriptPath );
		$this->assertSame( 'https',  $request->getUri()->scheme );
		$this->assertSame( '',  $request->getUri()->user );
		$this->assertSame( '',  $request->getUri()->password );
		$this->assertSame( 'nette.org',  $request->getUri()->host );
		$this->assertSame( 8080,  $request->getUri()->port );
		$this->assertSame( '/file.php',  $request->getUri()->path );
		$this->assertSame( "x param=val.&pa%\x72am=val2&param3=v a%26l%3Du%2Be",  $request->getUri()->query );
		$this->assertSame( '',  $request->getUri()->fragment );
		$this->assertSame( 'nette.org:8080',  $request->getUri()->authority );
		$this->assertSame( 'https://nette.org:8080',  $request->getUri()->hostUri );
		$this->assertSame( 'https://nette.org:8080/',  $request->getUri()->baseUri );
		$this->assertSame( '/',  $request->getUri()->basePath );
		$this->assertSame( 'file.php',  $request->getUri()->relativeUri );
		$this->assertSame( "https://nette.org:8080/file.php?x param=val.&pa%\x72am=val2&param3=v a%26l%3Du%2Be",  $request->getUri()->absoluteUri );
		$this->assertSame( '',  $request->getUri()->pathInfo );

		// getOriginalUri
		$this->assertSame( 'https',  $request->getOriginalUri()->scheme );
		$this->assertSame( '',  $request->getOriginalUri()->user );
		$this->assertSame( '',  $request->getOriginalUri()->password );
		$this->assertSame( 'nette.org',  $request->getOriginalUri()->host );
		$this->assertSame( 8080,  $request->getOriginalUri()->port );
		$this->assertSame( '/file.php',  $request->getOriginalUri()->path );
		$this->assertSame( 'x param=val.&pa%%72am=val2&param3=v%20a%26l%3Du%2Be)',  $request->getOriginalUri()->query );
		$this->assertSame( '',  $request->getOriginalUri()->fragment );
		$this->assertSame( 'val.',  $request->getQuery('x_param') );
		$this->assertSame( 'val2',  $request->getQuery('pa%ram') );
		$this->assertSame( 'v a&l=u+e',  $request->getQuery('param3') );
		$this->assertSame( '',  $request->getPostRaw() );
		$this->assertSame( 'nette.org:8080',  $request->headers['host'] );
	}

}
