<?php

/**
 * Nette Framework test
 */

use Nette\Json;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class JsonEncodeTest extends TestCase
{

	/**
	 * Nette\Json::encode()
	 */
	public function testNetteJsonEncode()
	{
		$this->assertSame( '"ok"', Json::encode('ok') );




		try {
			Json::encode(array("bad utf\xFF"));
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\JsonException', 'json_encode(): Invalid UTF-8 sequence in argument', $e );
		}



		try {
			$arr = array('recursive');
			$arr[] = & $arr;
			Json::encode($arr);
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\JsonException', 'json_encode(): recursion detected', $e );
		}
	}

}
