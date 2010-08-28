<?php

/**
 * Nette Framework test
 */

use Nette\Templates\Template,
	Nette\Templates\LatteFilter,
	Nette\Application\Control;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterMacros006Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';



		class MockControl extends Control
		{

			public function getSnippetId($name = NULL)
			{
				return 'sni__' . $name;
			}

		}



		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);
		$template->control = new MockControl;
		$template->render(file_get_contents(__DIR__ . '/templates/latte.snippet.phtml'));

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.006.expect'), $template->compiled);
	}

}
