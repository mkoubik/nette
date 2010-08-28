<?php

/**
 * Nette Framework test
 */

use Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterFetchTokenTest extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter::fetchToken()
	 */
	public function testLatteFilterFetchToken()
	{
		$s = '';
		$this->assertSame( NULL,  LatteFilter::fetchToken($s) );
		$this->assertSame( '',  $s );

		$s = '$1d-,a';
		$this->assertSame( '$1d-',  LatteFilter::fetchToken($s) );
		$this->assertSame( 'a',  $s );

		$s = '$1d"-,a';
		$this->assertSame( '$1d',  LatteFilter::fetchToken($s) );
		$this->assertSame( '"-,a',  $s );

		$s = '"item\'1""item2"';
		$this->assertSame( '"item\'1""item2"',  LatteFilter::fetchToken($s) );
		$this->assertSame( '',  $s );
	}

}
