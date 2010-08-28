<?php

/**
 * Nette Framework test
 */

use Nette\Object,
	Nette\Templates\Template,
	Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterMacros008Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';



		class MockControl extends Object
		{
			function getWidget($name)
			{
				$this->note( __METHOD__ );
				$this->note( func_get_args() );
				return new MockWidget;
			}

		}



		class MockWidget extends Object
		{

			function __call($name, $args)
			{
				$this->note( __METHOD__ );
				$this->note( func_get_args() );
			}

		}



		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');

		$template->control = new MockControl;
		$template->form = new MockWidget;
		$template->name = 'form';

		$template->render('
		{widget \'name\'}

		{widget form}

		{widget form:test}

		{widget $form:test}

		{widget $name:test}

		{widget $name:$name}

		{widget form var1}

		{widget form var1, 1, 2}

		{widget form var1 => 5, 1, 2}
		');

		$this->assertSame( array(
			"MockControl::getWidget", array("name"),
			"MockWidget::__call", array("render", array()),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("render", array()),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("renderTest", array()),
			"MockWidget::__call", array("renderTest", array()),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("renderTest", array()),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("renderform", array()),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("render", array("var1")),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("render", array("var1", 1, 2)),
			"MockControl::getWidget", array("form"),
			"MockWidget::__call", array("render", array(array("var1" => 5, 0 => 1, 1 => 2))),
		), $this->fetchNotes() );
	}

}
