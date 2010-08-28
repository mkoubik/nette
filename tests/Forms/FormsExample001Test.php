<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExample001Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		ob_start();
		require '../../examples/forms/basic-example.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.001.expect'), ob_get_clean() );
	}

}
