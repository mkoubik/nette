<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugDump006Test extends TestCase
{

	/**
	 * Nette\Debug::dump and strings.
	 */
	public function testNetteDebugDumpAndStrings()
	{
		Debug::$consoleMode = TRUE;
		Debug::$productionMode = FALSE;



		$this->assertMatch( 'array(8) [
		   0 => ""
		   1 => " "
		   2 => "	"
		   3 => "single line" (11)
		   4 => "multi
		line" (10)
		   5 => "Iñtërnâtiônàlizætiøn" (27)
		   6 => "\x00"
		   7 => "\xff"
		]

		', Debug::dump(array(
			'',
			' ',
			"\t",
			"single line",
			"multi\nline",
			"I\xc3\xb1t\xc3\xabrn\xc3\xa2ti\xc3\xb4n\xc3\xa0liz\xc3\xa6ti\xc3\xb8n", // Iñtërnâtiônàlizætiøn,
			"\x00",
			"\xFF",
		), TRUE));
	}

}
