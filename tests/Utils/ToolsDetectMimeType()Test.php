<?php

/**
 * Nette Framework test
 */

use Nette\Tools;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ToolsDetectMimeTypeTest extends TestCase
{

	/**
	 * Nette\Tools::detectMimeType()
	 */
	public function testNetteToolsDetectMimeType()
	{
		$this->assertSame( 'image/gif', Tools::detectMimeType('images/logo.gif') );
		$this->assertSame( 'application/octet-stream', Tools::detectMimeType('files/bad.ppt') );
	}

}
