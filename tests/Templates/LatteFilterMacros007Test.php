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
class LatteFilterMacros007Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';



		class MockTexy
		{
			function process($text, $singleLine = FALSE)
			{
				return '<pre>' . $text . '</pre>';
			}
		}



		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);
		$template->registerHelper('texy', array(new MockTexy, 'process'));
		$template->registerHelperLoader('Nette\Templates\TemplateHelpers::loader');

		$template->hello = '<i>Hello</i>';
		$template->people = array('John', 'Mary', 'Paul');

		$result = $template->render('
		{block|lower|texy}
		{$hello}
		---------
		- Escaped: {$hello}
		- Non-escaped: {!$hello}

		- Escaped expression: {="<" . "b" . ">hello" . "</b>"}

		- Non-escaped expression: {!="<" . "b" . ">hello" . "</b>"}

		- Array access: {$people[1]}

		[* image.jpg *]
		{/block}
		');

		$this->assertMatch(<<<EOD

		<pre>&lt;i&gt;hello&lt;/i&gt;
		---------
		- escaped: &lt;i&gt;hello&lt;/i&gt;
		- non-escaped: <i>hello</i>

		- escaped expression: &lt;b&gt;hello&lt;/b&gt;

		- non-escaped expression: <b>hello</b>

		- array access: mary

		[* image.jpg *]
		</pre>
		EOD
		, $result);
	}

}
