<?php

/**
 * Nette Framework test
 */

use Nette\Forms\Form;




/**
 * @package    Nette\Forms
 * @subpackage UnitTests
 */
class FormsInvalidInput002Test extends TestCase
{

	/**
	 * Nette\Forms invalid input.
	 */
	public function testNetteFormsInvalidInput()
	{
		$_SERVER['REQUEST_METHOD'] = 'POST';

		$_POST = array(
			'name' => "invalid\xAA\xAA\xAAutf",
			'note' => "invalid\xAA\xAA\xAAutf",
			'userid' => "invalid\xAA\xAA\xAAutf",
			'secondperson' => array(NULL),
		);

		$tmp = array(
			'name' => 'readme.txt',
			'type' => 'text/plain',
			'tmp_name' => 'C:\\PHP\\temp\\php1D5B.tmp',
			'error' => 0,
			'size' => 209,
		);

		$_FILES = array(
			'name' => $tmp,
			'note' => $tmp,
			'gender' => $tmp,
			'send' => $tmp,
			'country' => $tmp,
			'countrym' => $tmp,
			'password' => $tmp,
			'firstperson' => $tmp,
			'secondperson' => array(
				'age' => $tmp,
			),
			'submit1' => $tmp,
			'userid' => $tmp,
		);

		$countries = array(
			'Select your country',
			'Europe' => array(
				1 => 'Czech Republic',
				2 => 'Slovakia',
			),
			3 => 'USA',
			4 => 'other',
		);

		$sex = array(
			'm' => 'male',
			'f' => 'female',
		);

		$form = new Form();
		$form->addText('name', 'Your name:', 35);  // item name, label, size, maxlength
		$form->addTextArea('note', 'Comment:', 30, 5);
		$form->addRadioList('gender', 'Your gender:', $sex);
		$form->addCheckbox('send', 'Ship to address');
		$form->addSelect('country', 'Country:', $countries)->skipFirst();
		$form->addMultiSelect('countrym', 'Country:', $countries);
		$form->addPassword('password', 'Choose password:', 20);
		$form->addFile('avatar', 'Picture:');
		$form->addHidden('userid');

		$sub = $form->addContainer('firstperson');
		$sub->addText('age', 'Your age:', 5);

		$sub = $form->addContainer('secondperson');
		$sub->addText('age', 'Your age:', 5);
		$sub->addFile('avatar', 'Picture:');

		$form->addSubmit('submit1', 'Send');

		$this->assertTrue( (bool) $form->isSubmitted() );
		$this->assertEqual( array(
			'name' => 'invalidutf',
			'note' => 'invalidutf',
			'gender' => NULL,
			'send' => FALSE,
			'country' => NULL,
			'countrym' => array(),
			'password' => '',
			'avatar' => new Nette\Web\HttpUploadedFile(array()),
			'userid' => 'invalidutf',
			'firstperson' => array(
				'age' => '',
			),
			'secondperson' => array(
				'age' => '',
				'avatar' => new Nette\Web\HttpUploadedFile(array()),
			),
		), $form->getValues() );
	}

}
