<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugDump004Test extends TestCase
{

	/**
	 * Nette\Debug::dump() and $maxDepth and $maxLen.
	 */
	public function testNetteDebugDumpAndMaxDepthAndMaxLen()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;



		$arr = array(
			'long' => str_repeat('Nette Framework', 1000),

			array(
				array(
					array('hello' => 'world'),
				),
			),

			'long2' => str_repeat('Nette Framework', 1000),

			(object) array(
				(object) array(
					(object) array('hello' => 'world'),
				),
			),
		);

		$arr[] = &$arr;
		$this->assertMatch( 'array(5) {
		   "long" => "Nette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette Framework ... " (15000)
		   0 => array(1) [
		      0 => array(1) [
		         0 => array(1) { ... }
		      ]
		   ]
		   "long2" => "Nette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette Framework ... " (15000)
		   1 => stdClass(1) {
		      "0" => stdClass(1) {
		         "0" => stdClass(1) { ... }
		      }
		   }
		   2 => array(5) {
		      "long" => "Nette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette Framework ... " (15000)
		      0 => array(1) [
		         0 => array(1) [ ... ]
		      ]
		      "long2" => "Nette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette FrameworkNette Framework ... " (15000)
		      1 => stdClass(1) {
		         "0" => stdClass(1) { ... }
		      }
		      2 => array(6) { *RECURSION* }
		   }
		}

		', Debug::dump($arr, TRUE) );



		Debug::$maxDepth = 2;
		Debug::$maxLen = 50;
		$this->assertMatch( 'array(5) {
		   "long" => "Nette FrameworkNette FrameworkNette FrameworkNette ... " (15000)
		   0 => array(1) [
		      0 => array(1) [ ... ]
		   ]
		   "long2" => "Nette FrameworkNette FrameworkNette FrameworkNette ... " (15000)
		   1 => stdClass(1) {
		      "0" => stdClass(1) { ... }
		   }
		   2 => array(5) {
		      "long" => "Nette FrameworkNette FrameworkNette FrameworkNette ... " (15000)
		      0 => array(1) [ ... ]
		      "long2" => "Nette FrameworkNette FrameworkNette FrameworkNette ... " (15000)
		      1 => stdClass(1) { ... }
		      2 => array(6) { *RECURSION* }
		   }
		}

		', Debug::dump($arr, TRUE) );
	}

}
