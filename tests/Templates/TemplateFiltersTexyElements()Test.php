<?php

/**
 * Nette Framework test
 */

use Nette\Templates\Template,
	Nette\Templates\TemplateFilters;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class TemplateFiltersTexyElementsTest extends TestCase
{

	/**
	 * Nette\Templates\TemplateFilters::texyElements()
	 */
	public function testTemplateFiltersTexyElements()
	{
		require __DIR__ . '/Template.inc';



		class MockTexy
		{
			function process($text, $singleLine = FALSE)
			{
				return '<...>';
			}
		}


		TemplateFilters::$texy = new MockTexy;

		$template = new MockTemplate;
		$template->registerFilter(array('Nette\Templates\TemplateFilters', 'texyElements'));

		$this->assertMatch(<<<EOD
		<...>


		<...>


		<...>
		EOD

		, $template->render(<<<EOD
		<texy>**Hello World**</texy>


		<texy>
		Multi line
		----------

		example
		</texy>


		<texy param="value">
		Second multi line
		-----------------

		example
		</texy>
		EOD
		));
	}

}
