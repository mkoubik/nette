<?php

/**
 * Nette Framework test
 */

use Nette\Templates\TemplateHelpers;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class TemplateHelpersDateTest extends TestCase
{

	/**
	 * Nette\Templates\TemplateHelpers::date()
	 */
	public function testTemplateHelpersDate()
	{
		$this->assertNull( TemplateHelpers::date(NULL), "TemplateHelpers::date(NULL)" );


		$this->assertSame( "01/23/78", TemplateHelpers::date(254400000), "TemplateHelpers::date(timestamp)" );


		$this->assertSame( "05/05/78", TemplateHelpers::date('1978-05-05'), "TemplateHelpers::date(string)" );


		$this->assertSame( "05/05/78", TemplateHelpers::date(new DateTime('1978-05-05')), "TemplateHelpers::date(DateTime)" );


		$this->assertSame( "1978-01-23", TemplateHelpers::date(254400000, 'Y-m-d'), "TemplateHelpers::date(timestamp, format)" );


		$this->assertSame( "1212-09-26", TemplateHelpers::date('1212-09-26', 'Y-m-d'), "TemplateHelpers::date(string, format)" );


		$this->assertSame( "1212-09-26", TemplateHelpers::date(new DateTime('1212-09-26'), 'Y-m-d'), "TemplateHelpers::date(DateTime, format)" );
	}

}
