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
class LatteFilterMacros017Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';


		function xml($v) { echo $v; }

		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);

		$this->assertMatch(<<<EOD
		<?xml version="1.0" ?>
		12ok

		EOD

		, $template->render(<<<EOD
		<?xml version="1.0" ?>
		<?php xml(1) ?>
		<? xml(2) ?>
		<?php echo 'ok' ?>
		EOD
		));
	}

}
