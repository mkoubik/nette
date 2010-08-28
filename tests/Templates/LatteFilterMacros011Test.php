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
class LatteFilterMacros011Test extends TestCase
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
		$template->setFile(__DIR__ . '/templates/latte.xml.phtml');
		$template->registerFilter(new LatteFilter);
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');

		$template->hello = '<i>Hello</i>';
		$template->id = ':/item';
		$template->people = array('John', 'Mary', 'Paul', ']]>');
		$template->comment = 'test -- comment';
		$template->el = Nette\Web\Html::el('div')->title('1/2"');

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.011.expect'), (string) $template);
	}

}
