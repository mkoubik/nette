<?php

/**
 * Nette Framework test
 */

use Nette\Web\UriScript;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriScriptParseTest extends TestCase
{

	/**
	 * Nette\Web\UriScript parse.
	 */
	public function testUriScriptParse()
	{
		$uri = new UriScript('http://nette.org:8080/file.php?q=search');
		$this->assertSame( '', $uri->scriptPath );
		$this->assertSame( 'http://nette.org:8080',  $uri->baseUri );
		$this->assertSame( '', $uri->basePath );
		$this->assertSame( 'file.php',  $uri->relativeUri );
		$this->assertSame( '/file.php',  $uri->pathInfo );
	}

}
