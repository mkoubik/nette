<?php

/**
 * Nette Framework test
 */

use Nette\Annotations;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DateTime53Test extends TestCase
{

	/**
	 * DateTime53 test.
	 */
	public function testDateTime53Test()
	{
		date_default_timezone_set('Europe/Prague');

		$obj = new DateTime53('Mon, 23 Jan 1978 10:00:00', new DateTimeZone('Europe/London'));

		$this->assertSame( '1978-01-23 10:00:00', $obj->format('Y-m-d H:i:s') );
		$this->assertSame( 'Europe/London', $obj->getTimezone()->getName() );
		$this->assertSame( 254397600, $obj->getTimestamp() );


		$obj = unserialize(serialize($obj));

		$this->assertSame( '1978-01-23 10:00:00', $obj->format('Y-m-d H:i:s') );
		$this->assertSame( 'Europe/London', $obj->getTimezone()->getName() );
		$this->assertSame( 254397600, $obj->getTimestamp() );




		$obj = new DateTime53(NULL, new DateTimeZone('Europe/London'));
		$obj->setTimestamp(254400000);

		$this->assertSame( '1978-01-23 10:40:00', $obj->format('Y-m-d H:i:s') );
		$this->assertSame( 'Europe/London', $obj->getTimezone()->getName() );
		$this->assertSame( 254400000, $obj->getTimestamp() );


		$obj = unserialize(serialize($obj));

		$this->assertSame( '1978-01-23 10:40:00', $obj->format('Y-m-d H:i:s') );
		$this->assertSame( 'Europe/London', $obj->getTimezone()->getName() );
		$this->assertSame( 254400000, $obj->getTimestamp() );
	}

}
