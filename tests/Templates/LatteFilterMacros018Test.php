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
class LatteFilterMacros018Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and Nette\Web\Html::$xhtml.
	 */
	public function testLatteFilterAndHtmlXhtml()
	{
		require __DIR__ . '/Template.inc';



		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Template::setCacheStorage(new MockCacheStorage(__DIR__ . '/tmp'));


		Nette\Web\Html::$xhtml = FALSE;
		$template = new Template;
		$template->setFile(__DIR__ . '/templates/latte.phtml');
		$template->registerFilter(new LatteFilter);
		$template->registerHelper('translate', 'strrev');
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');

		$template->hello = '<i>Hello</i>';
		$template->id = ':/item';
		$template->people = array('John', 'Mary', 'Paul', ']]>');
		$template->menu = array('about', array('product1', 'product2'), 'contact');
		$template->comment = 'test -- comment';
		$template->el = Nette\Web\Html::el('div')->title('1/2"');

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.018.expect'), (string) $template);
	}

}
