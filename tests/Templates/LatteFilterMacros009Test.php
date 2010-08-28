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
class LatteFilterMacros009Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter delimiters.
	 */
	public function testLatteFilterDelimiters()
	{
		require __DIR__ . '/Template.inc';



		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Template::setCacheStorage(new MockCacheStorage(__DIR__ . '/tmp'));



		$template = new Template;
		$template->setFile(__DIR__ . '/templates/latte.delimiters.phtml');
		$template->registerFilter(new LatteFilter);
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');
		$template->people = array('John', 'Mary', 'Paul');

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.009.expect'), (string) $template);
	}

}
