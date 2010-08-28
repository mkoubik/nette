<?php

/**
 * Nette Framework test
 */

use Nette\Templates\TemplateHelpers;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class TemplateHelpersBytesTest extends TestCase
{

	/**
	 * Nette\Templates\TemplateHelpers::bytes()
	 */
	public function testTemplateHelpersBytes()
	{
		$this->assertSame( "0 B", TemplateHelpers::bytes(0.1), "TemplateHelpers::bytes(0.1)" );


		$this->assertSame( "-1.03 GB", TemplateHelpers::bytes(-1024 * 1024 * 1050), "TemplateHelpers::bytes(-1024 * 1024 * 1050)" );


		$this->assertSame( "8881.78 PB", TemplateHelpers::bytes(1e19), "TemplateHelpers::bytes(1e19)" );
	}

}
