<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectPropertyTest extends TestCase
{

	/**
	 * Nette\Object properties.
	 */
	public function testNetteObjectProperties()
	{
		require __DIR__ . '/Object.inc';



		$obj = new TestClass;
		$obj->foo = 'hello';
		$this->assertSame( 'hello', $obj->foo );
		$this->assertSame( 'hello', $obj->Foo );


		$obj->foo .= ' world';
		$this->assertSame( 'hello world', $obj->foo );



		// Undeclared property writing
		try {
			$obj->undeclared = 'value';
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('MemberAccessException', 'Cannot write to an undeclared property TestClass::$undeclared.', $e );
		}


		// Undeclared property reading
		$this->assertFalse( isset($obj->S) );
		$this->assertFalse( isset($obj->s) );
		$this->assertFalse( isset($obj->undeclared) );

		try {
			$val = $obj->s;
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('MemberAccessException', 'Cannot read an undeclared property TestClass::$s.', $e );
		}



		// Read-only property
		$obj = new TestClass('Hello', 'World');
		$this->assertSame( 'World', $obj->bar );

		try {
			$obj->bar = 'value';
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('MemberAccessException', 'Cannot write to a read-only property TestClass::$bar.', $e );
		}
	}

}
