<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugTimerTest extends TestCase
{

	/**
	 * Nette\Debug::timer()
	 */
	public function testNetteDebugTimer()
	{
		Debug::timer();

		sleep(1);

		Debug::timer('foo');

		sleep(1);

		$this->assertSame( 2.0, round(Debug::timer(), 1) );

		$this->assertSame( 1.0, round(Debug::timer('foo'), 1) );
	}

}
