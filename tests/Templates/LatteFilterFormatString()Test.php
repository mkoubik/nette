<?php

/**
 * Nette Framework test
 */

use Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterFormatStringTest extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter::formatString()
	 */
	public function testLatteFilterFormatString()
	{
		$this->assertSame( '""',  LatteFilter::formatString('') );
		$this->assertSame( '" "',  LatteFilter::formatString(' ') );
		$this->assertSame( "0",  LatteFilter::formatString('0') );
		$this->assertSame( "-0.0",  LatteFilter::formatString('-0.0') );
		$this->assertSame( '"symbol"',  LatteFilter::formatString('symbol') );
		$this->assertSame( "\$var",  LatteFilter::formatString('$var') );
		$this->assertSame( '"symbol$var"',  LatteFilter::formatString('symbol$var') );
		$this->assertSame( "'var'",  LatteFilter::formatString("'var'") );
		$this->assertSame( '"var"',  LatteFilter::formatString('"var"') );
		$this->assertSame( '"v\\"ar"',  LatteFilter::formatString('"v\\"ar"') );
		$this->assertSame( "'var\"",  LatteFilter::formatString("'var\"") );
	}

}
