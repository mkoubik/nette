<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsUserValidatorTest extends TestCase
{

	/**
	 * Nette\Forms user validator.
	 */
	public function testNetteFormsUserValidator()
	{
		function myValidator1($item, $arg)
		{
			return $item->getValue() != $arg;
		}


		$form = new Form();
		$form->addText('name', 'Text:', 10)
			->addRule('myValidator1', 'Value %d is not allowed!', 11)
			->addRule(~'myValidator1', 'Value %d is required!', 22);

		// TODO: add assert
	}

}
