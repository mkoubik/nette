<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringReplace53Test extends TestCase
{

	/**
	 * Nette\String::replace()
	 */
	public function testNetteStringReplace()
	{
		$this->assertSame( '@o wor@d!', String::replace('hello world!', '#[e-l]+#', function() { return '@'; }) );
	}

}
