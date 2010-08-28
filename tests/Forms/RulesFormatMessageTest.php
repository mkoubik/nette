<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class RulesFormatMessageTest extends TestCase
{

	/**
	 * Nette\Forms\Rules::validateMessage()
	 */
	public function testRulesValidateMessage()
	{
		$form = new Form;
		$form->addText('email', 'E-mail')
			->addRule(Form::EMAIL, '%label %value is invalid [field %name]')
			->setDefaultValue('xyz');

		$this->assertMatch("%A%data-nette-rules=\"{op:':email',msg:'E-mail %value is invalid [field email]'}\"%A%", (string) $form);

		$form->validate();

		$this->assertSame( array(
			"E-mail xyz is invalid [field email]",
		), $form->getErrors() );
	}

}
