<?php

/**
 * Nette Framework test
 */

use Nette\Paginator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class Paginator004Test extends TestCase
{

	/**
	 * Nette\Paginator Base:1 test.
	 */
	public function testNettePaginatorBase1Test()
	{
		$paginator = new Paginator;
		$paginator->itemCount = 7;
		$paginator->itemsPerPage = 6;
		$paginator->base = 1;
		$paginator->page = 3;

		$this->assertSame( 2, $paginator->page );
		$this->assertSame( 2, $paginator->pageCount );
		$this->assertSame( 1, $paginator->firstPage );
		$this->assertSame( 2, $paginator->lastPage );
		$this->assertSame( 6, $paginator->offset );
		$this->assertSame( 0, $paginator->countdownOffset );
		$this->assertSame( 1, $paginator->length );
	}

}
