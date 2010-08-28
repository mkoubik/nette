<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExampleSubmit001Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		$disableExit = TRUE;
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST = array('name'=>'John Doe ','age'=>'','email'=>'  @ ','send'=>'on','street'=>'','city'=>'','country'=>'HU','password'=>'xxx','password2'=>'','note'=>'','submit1'=>'Send','userid'=>'231',);
		Nette\Debug::$productionMode = FALSE;
		Nette\Debug::$consoleMode = TRUE;

		ob_start();
		require '../../examples/forms/basic-example.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.submit.001.expect'), ob_get_clean() );
	}

}
