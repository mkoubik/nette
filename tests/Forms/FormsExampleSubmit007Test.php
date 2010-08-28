<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExampleSubmit007Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		$disableExit = TRUE;
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST = array('name'=>'John Doe ','age'=>'  12 ','email'=>'@','street'=>'','city'=>'','country'=>'CZ','password'=>'xxx','password2'=>'xxx','note'=>'','userid'=>'231','submit1'=>'Send',);
		Nette\Debug::$productionMode = FALSE;
		Nette\Debug::$consoleMode = TRUE;

		ob_start();
		require '../../examples/forms/manual-rendering.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.submit.007.expect'), ob_get_clean() );
	}

}
