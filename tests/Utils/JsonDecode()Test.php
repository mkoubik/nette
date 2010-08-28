<?php

/**
 * Nette Framework test
 */

use Nette\Json;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class JsonDecodeTest extends TestCase
{

	/**
	 * Nette\Json::decode()
	 */
	public function testNetteJsonDecode()
	{
		$this->assertSame( "ok", Json::decode('"ok"') );
		$this->assertNull( Json::decode('') );
		$this->assertNull( Json::decode('null') );
		$this->assertNull( Json::decode('NULL') );


		$this->assertEqual( (object) array('a' => 1), Json::decode('{"a":1}') );
		$this->assertSame( array('a' => 1), Json::decode('{"a":1}', Json::FORCE_ARRAY) );



		try {
			Json::decode('{');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\JsonException', 'Syntax error, malformed JSON', $e );
		}



		try {
			Json::decode('{}}');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\JsonException', 'Syntax error, malformed JSON', $e );
		}



		try {
			Json::decode("\x00");
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\JsonException', 'Unexpected control character found', $e );
		}
	}

}
