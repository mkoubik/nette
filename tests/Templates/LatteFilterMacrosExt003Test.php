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
class LatteFilterMacrosExt003Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';



		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Template::setCacheStorage(new MockCacheStorage(__DIR__ . '/tmp'));



		$template = new Template;
		$template->setFile(__DIR__ . '/templates/latte.inheritance.child3.phtml');
		$template->registerFilter(new LatteFilter);

		$this->assertMatch(<<<EOD

			Content
		EOD
		, (string) $template);
	}

}
