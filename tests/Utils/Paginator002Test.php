<?php

/**
 * Nette Framework test
 */

use Nette\Paginator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class Paginator002Test extends TestCase
{

	/**
	 * Nette\Paginator Base:0 Page:-1 PerPage:7 test.
	 */
	public function testNettePaginatorBase0Page1PerPage7Test()
	{
		$paginator = new Paginator;
		$paginator->itemCount = 7;
		$paginator->itemsPerPage = 7;
		$paginator->base = 0;
		$paginator->page = -1;

		$this->assertSame( 0, $paginator->page );
		$this->assertSame( 1, $paginator->pageCount );
		$this->assertSame( 0, $paginator->firstPage );
		$this->assertSame( 0, $paginator->lastPage );
		$this->assertSame( 0, $paginator->offset );
		$this->assertSame( 0, $paginator->countdownOffset );
		$this->assertSame( 7, $paginator->length );
	}

}
