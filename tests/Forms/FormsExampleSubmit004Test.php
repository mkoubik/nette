<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExampleSubmit004Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		$disableExit = TRUE;
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST = array('name'=>'John Doe ','age'=>'9.9','email'=>'@','street'=>'','city'=>'Troubsko','country'=>'0','password'=>'xx','password2'=>'xx','note'=>'','submit1'=>'Send','userid'=>'231',);
		Nette\Debug::$productionMode = FALSE;
		Nette\Debug::$consoleMode = TRUE;

		ob_start();
		require '../../examples/forms/custom-rendering.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.submit.004.expect'), ob_get_clean() );
	}

}
