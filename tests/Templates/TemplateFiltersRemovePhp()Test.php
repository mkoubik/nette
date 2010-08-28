<?php

/**
 * Nette Framework test
 */

use Nette\Templates\Template;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class TemplateFiltersRemovePhpTest extends TestCase
{

	/**
	 * Nette\Templates\TemplateFilters::removePhp()
	 */
	public function testTemplateFiltersRemovePhp()
	{
		require __DIR__ . '/Template.inc';



		$template = new MockTemplate;
		$template->registerFilter(array('Nette\Templates\TemplateFilters', 'removePhp'));

		$this->assertMatch(<<<EOD
		Hello World!

		<?php doEvil(); ?>
		EOD

		, $template->render(<<<EOD
		Hello<?php echo '?>hacked!'; ?> World!

		<<?php ?>?php doEvil(); ?>

		EOD
		));
	}

}
