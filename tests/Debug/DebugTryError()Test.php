<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugTryErrorTest extends TestCase
{

	/**
	 * Nette\Debug::tryError() & catchError.
	 */
	public function testNetteDebugTryErrorCatchError()
	{
		Debug::tryError(); {
			$a++;
		} $res = Debug::catchError($message);

		$this->assertTrue( $res );
		$this->assertSame( "Undefined variable: a", $message );



		Debug::tryError(); {

		} $res = Debug::catchError($message);

		$this->assertFalse( $res );
		$this->assertNull( $message );
	}

}
