<?php

/**
 * Nette Framework test
 */

use Nette\NeonParser;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class NeonParser001Test extends TestCase
{

	/**
	 * Nette\NeonParser simple values.
	 */
	public function testNetteNeonParserSimpleValues()
	{
		$parser = new NeonParser;

		$this->assertNull( $parser->parse('') );
		$this->assertNull( $parser->parse('   ') );
		$this->assertSame( 1, $parser->parse('1') );
		$this->assertSame( -1.2, $parser->parse('-1.2') );
		$this->assertSame( -120.0, $parser->parse('-1.2e2') );
		$this->assertTrue( $parser->parse('true') );
		$this->assertNull( $parser->parse('null') );
		$this->assertSame( 'the"string#literal', $parser->parse('the"string#literal') );
		$this->assertSame( 'the"string', $parser->parse('the"string #literal') );
		$this->assertSame( "the'string #literal", $parser->parse('"the\'string #literal"') );
		$this->assertSame( 'the"string #literal', $parser->parse("'the\"string #literal'") );
		$this->assertSame( "", $parser->parse("''") );
		$this->assertSame( "", $parser->parse('""') );
		$this->assertSame( 'x', $parser->parse('x') );
		$this->assertSame( "x", $parser->parse("\nx\n") );
		$this->assertSame( "x", $parser->parse("\n  x  \n") );
		$this->assertSame( "x", $parser->parse("  x") );
	}

}
