<?php

/**
 * Nette Framework test
 */

use Nette\Web\UriScript;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriScriptModifyTest extends TestCase
{

	/**
	 * Nette\Web\UriScript modify.
	 */
	public function testUriScriptModify()
	{
		$uri = new UriScript('http://nette.org:8080/file.php?q=search');
		$uri->path = '/test/';
		$uri->scriptPath = '/test/index.php';

		$this->assertSame( '/test/index.php',  $uri->scriptPath );
		$this->assertSame( 'http://nette.org:8080/test/',  $uri->baseUri );
		$this->assertSame( '/test/',  $uri->basePath );
		$this->assertSame( '',  $uri->relativeUri );
		$this->assertSame( '',  $uri->pathInfo );
		$this->assertSame( 'http://nette.org:8080/test/?q=search',  $uri->absoluteUri );
	}

}
