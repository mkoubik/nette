<?php

/**
 * Nette Framework test
 */

use Nette\Callback;




class Test
{
	static function add($a, $b)
	{
		return $a + $b;
	}
}


/**
 * @package    Nette
 * @subpackage UnitTests
 */
class CallbackTest extends TestCase
{

	/**
	 * Nette\Callback tests.
	 */
	public function testNetteCallbackTests()
	{
		$this->assertSame( 'Test::add', (string) new Callback(new Test, 'add') );
		$this->assertSame( 'Test::add', (string) new Callback('Test', 'add') );
		$this->assertSame( 'Test::add', (string) new Callback('Test::add') );
		$this->assertSame( 'undefined', (string) new Callback('undefined') );



		$cb = new Callback(new Test, 'add');

		$this->assertSame( 8, $cb/*5.2*->invoke*/(3, 5) );
		$this->assertSame( 8, $cb->invokeArgs(array(3, 5)) );
		$this->assertEqual( array(new Test, 'add'), $cb->getNative() );
		$this->assertTrue( $cb->isCallable() );


		try {
			callback('undefined')->invoke();
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Callback 'undefined' is not callable.", $e );
		}

		try {
			callback(NULL)->invoke();
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', 'Invalid callback.', $e );
		}
	}

}
