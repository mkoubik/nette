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
class LatteFilterMacros015Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';


		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);
		try {
			$template->render('Block{/block}');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', 'Filter Nette\Templates\LatteFilter::__invoke: Tag {/block } was not expected here on line %a%.', $e );
		}
	}

}
