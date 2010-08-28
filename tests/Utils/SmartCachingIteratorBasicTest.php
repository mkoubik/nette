<?php

/**
 * Nette Framework test
 */

use Nette\SmartCachingIterator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class SmartCachingIteratorBasicTest extends TestCase
{

	/**
	 * Nette\SmartCachingIterator basic usage.
	 */
	public function testNetteSmartCachingIteratorBasicUsage()
	{
		// ==> Two items in array

		$arr = array('Nette', 'Framework');

		$iterator = new SmartCachingIterator($arr);
		$iterator->rewind();
		$this->assertTrue( $iterator->valid() );
		$this->assertTrue( $iterator->isFirst() );
		$this->assertFalse( $iterator->isLast() );
		$this->assertSame( 1, $iterator->getCounter() );

		$iterator->next();
		$this->assertTrue( $iterator->valid() );
		$this->assertFalse( $iterator->isFirst() );
		$this->assertTrue( $iterator->isLast() );
		$this->assertSame( 2, $iterator->getCounter() );

		$iterator->next();
		$this->assertFalse( $iterator->valid() );

		$iterator->rewind();
		$this->assertTrue( $iterator->isFirst() );
		$this->assertFalse( $iterator->isLast() );
		$this->assertSame( 1, $iterator->getCounter() );
		$this->assertFalse( $iterator->isEmpty() );



		$arr = array('Nette');

		$iterator = new SmartCachingIterator($arr);
		$iterator->rewind();
		$this->assertTrue( $iterator->valid() );
		$this->assertTrue( $iterator->isFirst() );
		$this->assertTrue( $iterator->isLast() );
		$this->assertSame( 1, $iterator->getCounter() );

		$iterator->next();
		$this->assertFalse( $iterator->valid() );

		$iterator->rewind();
		$this->assertTrue( $iterator->isFirst() );
		$this->assertTrue( $iterator->isLast() );
		$this->assertSame( 1, $iterator->getCounter() );
		$this->assertFalse( $iterator->isEmpty() );



		$arr = array();

		$iterator = new SmartCachingIterator($arr);
		$iterator->next();
		$iterator->next();
		$this->assertFalse( $iterator->isFirst() );
		$this->assertTrue( $iterator->isLast() );
		$this->assertSame( 0, $iterator->getCounter() );
		$this->assertTrue( $iterator->isEmpty() );
	}

}
