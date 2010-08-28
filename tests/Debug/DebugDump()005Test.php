<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugDump005Test extends TestCase
{

	/**
	 * Nette\Debug::dump() and recursive arrays.
	 */
	public function testNetteDebugDumpAndRecursiveArrays()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;


		$arr = array(1, 2, 3);
		$arr[] = & $arr;
		$this->assertMatch( 'array(4) [
		   0 => 1
		   1 => 2
		   2 => 3
		   3 => array(4) [
		      0 => 1
		      1 => 2
		      2 => 3
		      3 => array(5) [ *RECURSION* ]
		   ]
		]
		', Debug::dump($arr, TRUE) );



		$arr = array('x' => 1, 'y' => 2);
		$arr[] = & $arr;
		$this->assertMatch( 'array(3) {
		   "x" => 1
		   "y" => 2
		   0 => array(3) {
		      "x" => 1
		      "y" => 2
		      0 => array(4) { *RECURSION* }
		   }
		}
		', Debug::dump($arr, TRUE) );
	}

}
