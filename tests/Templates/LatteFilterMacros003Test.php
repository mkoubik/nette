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
class LatteFilterMacros003Test extends TestCase
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



		class MyHelper
		{
			protected $count = 0;

			public function invoke($s)
			{
				$this->count++;
				return strtolower($s) . " ($this->count times)";
			}

		}

		function types()
		{
			foreach (func_get_args() as $arg) $res[] = gettype($arg);
			return implode(', ', $res);
		}



		$template = new Template;
		$template->setFile(__DIR__ . '/templates/latte.helpers.phtml');
		$template->registerFilter(new LatteFilter);
		$template->registerHelper('nl2br', 'nl2br');
		$template->registerHelper('h1', array(new MyHelper, 'invoke'));
		$template->registerHelper('h2', 'strtoupper');
		$template->registerHelper('translate', 'strrev');
		$template->registerHelper('types', 'types');
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');

		$template->hello = 'Hello World';
		$template->date = strtotime('2008-01-02');

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.003.expect'), (string) $template);
	}

}
