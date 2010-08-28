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
class LatteFilterMacros016Test extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter and macros test.
	 */
	public function testLatteFilterAndMacrosTest()
	{
		require __DIR__ . '/Template.inc';



		$template = new MockTemplate;
		$template->registerFilter(new LatteFilter);

		$template->render(<<<EOD
		{* k�d  *}

		@{if TRUE}
				{* k�d  *}
		@{else}
				{* k�d  *}
		@{/if}

		{* k�d  *}

		EOD
		);

		$this->assertMatch('<?php
		%A%

		if (%ns%SnippetHelper::$outputAllowed) {
		} if (TRUE): if (%ns%SnippetHelper::$outputAllowed) { ?>
				<?php } ;else: if (%ns%SnippetHelper::$outputAllowed) { ?>
				<?php } endif ;if (%ns%SnippetHelper::$outputAllowed) { ?>

		<?php
		}

		', $template->compiled);
	}

}
