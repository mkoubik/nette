<?php

/**
 * Nette Framework test
 */

use Nette\Paginator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class Paginator005Test extends TestCase
{

	/**
	 * Nette\Paginator ItemCount:0 test.
	 */
	public function testNettePaginatorItemCount0Test()
	{
		$paginator = new Paginator;

		// ItemCount: 0
		$paginator->setItemCount(0);
		$this->assertTrue( $paginator->isFirst() );
		$this->assertTrue( $paginator->isLast() );


		// ItemCount: 1
		$paginator->setItemCount(1);
		$this->assertTrue( $paginator->isFirst() );
		$this->assertTrue( $paginator->isLast() );


		// ItemCount: 2
		$paginator->setItemCount(2);
		$this->assertTrue( $paginator->isFirst() );
		$this->assertFalse( $paginator->isLast() );

		// Page 2
		$paginator->setPage(2);
		$this->assertFalse( $paginator->isFirst() );
		$this->assertTrue( $paginator->isLast() );
	}

}
