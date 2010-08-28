<?php

/**
 * Nette Framework test
 */

use Nette\SmartCachingIterator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class SmartCachingIteratorWidthTest extends TestCase
{

	/**
	 * Nette\SmartCachingIterator width.
	 */
	public function testNetteSmartCachingIteratorWidth()
	{
		$arr = array('The', 'Nette', 'Framework');

		$iterator = new SmartCachingIterator($arr);
		$iterator->rewind();

		$iterator->rewind();
		$this->assertTrue( $iterator->valid() );
		$this->assertTrue( $iterator->isFirst(0) );
		$this->assertFalse( $iterator->isLast(0) );
		$this->assertTrue( $iterator->isFirst(1) );
		$this->assertTrue( $iterator->isLast(1) );
		$this->assertTrue( $iterator->isFirst(2) );
		$this->assertFalse( $iterator->isLast(2) );

		$iterator->next();
		$this->assertTrue( $iterator->valid() );
		$this->assertFalse( $iterator->isFirst(0) );
		$this->assertFalse( $iterator->isLast(0) );
		$this->assertTrue( $iterator->isFirst(1) );
		$this->assertTrue( $iterator->isLast(1) );
		$this->assertFalse( $iterator->isFirst(2) );
		$this->assertTrue( $iterator->isLast(2) );

		$iterator->next();
		$this->assertTrue( $iterator->valid() );
		$this->assertFalse( $iterator->isFirst(0) );
		$this->assertTrue( $iterator->isLast(0) );
		$this->assertTrue( $iterator->isFirst(1) );
		$this->assertTrue( $iterator->isLast(1) );
		$this->assertTrue( $iterator->isFirst(2) );
		$this->assertTrue( $iterator->isLast(2) );

		$iterator->next();
		$this->assertFalse( $iterator->valid() );


		$iterator = new SmartCachingIterator(array());
		$this->assertSame( FALSE,  $iterator->isFirst(0) );
		$this->assertSame( TRUE,  $iterator->isLast(0) );
		$this->assertSame( FALSE,  $iterator->isFirst(1) );
		$this->assertSame( TRUE,  $iterator->isLast(1) );
		$this->assertSame( FALSE,  $iterator->isFirst(2) );
		$this->assertSame( TRUE,  $iterator->isLast(2) );
	}

}
