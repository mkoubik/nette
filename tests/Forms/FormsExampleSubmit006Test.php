<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsExampleSubmit006Test extends TestCase
{

	/**
	 * Nette\Forms example.
	 */
	public function testNetteFormsExample()
	{
		$disableExit = TRUE;
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST = array('first'=>array('name'=>'James Bond','email'=>'bond@007.com','street'=>'Unknown','city'=>'London','country'=>'GB',),'second'=>array('name'=>'Jim Beam','email'=>'jim@beam.com','street'=>'','city'=>'','country'=>'US',),'submit1'=>'Send',);
		Nette\Debug::$productionMode = FALSE;
		Nette\Debug::$consoleMode = TRUE;

		ob_start();
		require '../../examples/forms/naming-containers.php';
		$this->assertMatch( file_get_contents(__DIR__ . '/Forms.example.submit.006.expect'), ob_get_clean() );
	}

}
