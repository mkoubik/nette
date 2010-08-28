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
class LatteFilterMacrosExt002Test extends TestCase
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
		$template->setFile(__DIR__ . '/templates/latte.inheritance.child2.phtml');
		$template->registerFilter(new LatteFilter);

		$template->people = array('John', 'Mary', 'Paul');

		$this->assertMatch(file_get_contents(__DIR__ . '/LatteFilter.macros.ext.002.expect'), (string) $template);
	}

}
