<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriMalformedUriTest extends TestCase
{

	/**
	 * Nette\Web\Uri malformed URI.
	 */
	public function testUriMalformedURI()
	{
		try {
			$uri = new Uri(':');

			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Malformed or unsupported URI ':'.", $e );
		}
	}

}
