<?php

/**
 * Nette Framework test
 */

use Nette\Templates\Template,
	Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterMacros013Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';



		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);
		$this->assertMatch(<<<EOD

		asdfgh
		EOD

		, $template->render(<<<EOD

		{contentType text}
		asdfgh
		EOD
		));
	}

}
