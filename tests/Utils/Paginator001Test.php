<?php

/**
 * Nette Framework test
 */

use Nette\Paginator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class Paginator001Test extends TestCase
{

	/**
	 * Nette\Paginator Base:0 Page:-1 test.
	 */
	public function testNettePaginatorBase0Page1Test()
	{
		$paginator = new Paginator;
		$paginator->itemCount = 7;
		$paginator->itemsPerPage = 6;
		$paginator->base = 0;
		$paginator->page = -1;

		$this->assertSame( 0, $paginator->page );
		$this->assertSame( 0, $paginator->offset );
		$this->assertSame( 1, $paginator->countdownOffset );
		$this->assertSame( 6, $paginator->length );
	}

}
