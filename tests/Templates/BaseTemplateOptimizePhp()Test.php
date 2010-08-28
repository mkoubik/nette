<?php

/**
 * Nette Framework test
 */

use Nette\Templates\BaseTemplate;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class BaseTemplateOptimizePhpTest extends TestCase
{

	/**
	 * Nette\Templates\BaseTemplate::optimizePhp()
	 */
	public function testBaseTemplateOptimizePhp()
	{
		$input = file_get_contents(__DIR__ . '/templates/optimize.phtml');
		$expected = file_get_contents(__DIR__ . '/BaseTemplate.optimizePhp().expect');
		$this->assertMatch($expected, BaseTemplate::optimizePhp($input));
	}

}
