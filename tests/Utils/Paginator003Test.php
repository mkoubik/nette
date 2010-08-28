<?php

/**
 * Nette Framework test
 */

use Nette\Paginator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class Paginator003Test extends TestCase
{

	/**
	 * Nette\Paginator Base:0 Page:-1 Count:-1 test.
	 */
	public function testNettePaginatorBase0Page1Count1Test()
	{
		$paginator = new Paginator;
		$paginator->itemCount = -1;
		$paginator->itemsPerPage = 7;
		$paginator->base = 0;
		$paginator->page = -1;

		$this->assertSame( 0, $paginator->page );
		$this->assertSame( 0, $paginator->pageCount );
		$this->assertSame( 0, $paginator->firstPage );
		$this->assertSame( 0, $paginator->lastPage );
		$this->assertSame( 0, $paginator->offset );
		$this->assertSame( 0, $paginator->countdownOffset );
		$this->assertSame( 0, $paginator->length );
	}

}
