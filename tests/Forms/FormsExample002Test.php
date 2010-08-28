<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExample002Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		ob_start();
		require '../../examples/forms/CSRF-protection.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.002.expect'), ob_get_clean() );
	}

}
