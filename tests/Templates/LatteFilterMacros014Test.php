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
class LatteFilterMacros014Test extends TestCase
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
		Block

		EOD

		, $template->render(<<<EOD
		{block}
		Block

		EOD
		));
	}

}
