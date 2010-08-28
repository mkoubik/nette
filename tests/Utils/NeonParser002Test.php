<?php

/**
 * Nette Framework test
 */

use Nette\NeonParser;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class NeonParser002Test extends TestCase
{

	/**
	 * Nette\NeonParser inline hash and array.
	 */
	public function testNetteNeonParserInlineHashAndArray()
	{
		$parser = new NeonParser;

		$this->assertSame( array(
			TRUE,
			'tRuE',
			TRUE,
			FALSE,
			FALSE,
			TRUE,
			TRUE,
			FALSE,
			FALSE,
			NULL,
			NULL,
		), $parser->parse('[true, tRuE, TRUE, false, FALSE, yes, YES, no, NO, null, NULL,]') );


		$this->assertSame( array(
			1 => 1,
			'' => 1,
			-5 => 1,
			'5.3' => 1,
		), $parser->parse('{true: 1, false: 1, null: 1, -5: 1, 5.3: 1}') );


		$this->assertSame( array(
			0 => 'a',
			1 => 'b',
			2 => array(
				'c' => 'd',
			),
			'e' => 'f',
		), $parser->parse('{a, b, {c: d}, e: f,}') );
	}

}
