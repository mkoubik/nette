<?php

/**
 * Nette Framework test
 */

use Nette\Environment,
	Nette\Templates\Template,
	Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterMacros002Test extends TestCase
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
		Environment::setVariable('tempDir', __DIR__ . '/tmp');



		$template = new Template;
		$template->setFile(__DIR__ . '/templates/latte.cache.phtml');
		$template->registerFilter(new LatteFilter);
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');

		$template->title = 'Hello';
		$template->id = 456;

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.002.expect'), (string) $template);
	}

}
