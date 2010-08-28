<?php

/**
 * Nette Framework test
 */

use Nette\Templates\Template;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class TemplateFiltersRelativeLinksTest extends TestCase
{

	/**
	 * Nette\Templates\TemplateFilters::relativeLinks()
	 */
	public function testTemplateFiltersRelativeLinks()
	{
		require __DIR__ . '/Template.inc';



		$template = new MockTemplate;
		$template->registerFilter(array('Nette\Templates\TemplateFilters', 'relativeLinks'));

		$template->baseUri = 'http://example.com/~my/';

		$this->assertMatch(<<<EOD
		<a href="http://example.com/~my/relative">link</a>

		<a href="http://example.com/~my/relative#fragment">link</a>

		<a href="#fragment">link</a>

		<a href="http://url">link</a>

		<a href="mailto:john@example.com">link</a>

		<a href="/absolute-path">link</a>

		<a href="//absolute">link</a>
		EOD

		, $template->render(<<<EOD
		<a href="relative">link</a>

		<a href="relative#fragment">link</a>

		<a href="#fragment">link</a>

		<a href="http://url">link</a>

		<a href="mailto:john@example.com">link</a>

		<a href="/absolute-path">link</a>

		<a href="//absolute">link</a>
		EOD
		));
	}

}
