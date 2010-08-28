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
class LatteFilterMacrosExt005Test extends TestCase
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
		$template->setFile(__DIR__ . '/templates/latte.inheritance.child5.phtml');
		$template->registerFilter(new LatteFilter);

		$template->ext = 'latte.inheritance.parent.phtml';

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.ext.005.expect'), (string) $template);
	}

}
