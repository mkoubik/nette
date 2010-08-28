<?php

/**
 * Nette Framework test
 */

use Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterFormatArrayTest extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter::formatArray()
	 */
	public function testLatteFilterFormatArray()
	{
		// symbols

		$this->assertSame( '',  LatteFilter::formatArray('') );
		$this->assertSame( '',  LatteFilter::formatArray('', '&') );
		$this->assertSame( 'array(1)',  LatteFilter::formatArray('1') );
		$this->assertSame( '&array(1)',  LatteFilter::formatArray('1', '&') );
		$this->assertSame( "array('symbol')",  LatteFilter::formatArray('symbol') );
		$this->assertSame( "array(1, 2,'symbol1','symbol2')",  LatteFilter::formatArray('1, 2, symbol1, symbol2') );

		// strings

		$this->assertSame( 'array("\"1, 2, symbol1, symbol2")',  LatteFilter::formatArray('"\"1, 2, symbol1, symbol2"') ); // unable to parse "${'"'}" yet
		$this->assertSame( "array('\\'1, 2, symbol1, symbol2')",  LatteFilter::formatArray("'\\'1, 2, symbol1, symbol2'") );
		$this->assertSame( "array('\\\\'1, 2,'symbol1', symbol2')",  LatteFilter::formatArray("'\\\\'1, 2, symbol1, symbol2'") );

		// key words

		$this->assertSame( 'array(TRUE, false, null, 1 or 1 and 2 xor 3, clone $obj, new Class)',  LatteFilter::formatArray('TRUE, false, null, 1 or 1 and 2 xor 3, clone $obj, new Class') );
		$this->assertSame( 'array(func (10))',  LatteFilter::formatArray('func (10)') );

		// associative arrays

		$this->assertSame( "array('symbol1' =>'value','symbol2'=>'value')",  LatteFilter::formatArray('symbol1 => value,symbol2=>value') );
		$this->assertSame( "array('symbol1' => array ('symbol2' =>'value'))",  LatteFilter::formatArray('symbol1 => array (symbol2 => value)') );
	}

}
