<?php

/**
 * Nette Framework test
 */

use Nette\Forms\TextBase,
	Nette\Forms\TextInput;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class TestBaseValidatorsTest extends TestCase
{

	/**
	 * Nette\Forms\TextBase validators.
	 */
	public function testTextBaseValidators()
	{
		$control = new TextInput();
		$control->value = '';
		$this->assertFalse( TextBase::validateEmail($control) );


		$control->value = '@.';
		$this->assertFalse( TextBase::validateEmail($control) );


		$control->value = 'name@a-b-c.cz';
		$this->assertTrue( TextBase::validateEmail($control) );


		$control->value = "name@\xc5\xbelu\xc5\xa5ou\xc4\x8dk\xc3\xbd.cz"; // name@žluouèký.cz
		$this->assertTrue( TextBase::validateEmail($control) );


		$control->value = "\xc5\xbename@\xc5\xbelu\xc5\xa5ou\xc4\x8dk\xc3\xbd.cz"; // žname@žluouèký.cz
		$this->assertFalse( TextBase::validateEmail($control) );
	}

}
