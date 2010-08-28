<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExampleSubmit002Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		$disableExit = TRUE;
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST = array('text'=>'a','submit1'=>'Send',);
		Nette\Debug::$productionMode = FALSE;
		Nette\Debug::$consoleMode = TRUE;

		ob_start();
		require '../../examples/forms/CSRF-protection.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.submit.002.expect'), ob_get_clean() );
	}

}
