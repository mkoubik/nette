<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form,
	Nette\Web\Html;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsHtmlTest extends TestCase
{

	/**
	 * Nette\Forms and Html.
	 */
	public function testNetteFormsAndHtml()
	{
		$form = new Form;
		$form->addText('input', Html::el('b')->setText('Strong text.'));

		$this->assertMatch(<<<EOD
		%A%
			<th><label for="frm-input"><b>Strong text.</b></label></th>
		%A%
		EOD
		, (string) $form);
	}

}
