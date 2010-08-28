<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExample005Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		ob_start();
		require '../../examples/forms/custom-validator.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.005.expect'), ob_get_clean() );
	}

}
