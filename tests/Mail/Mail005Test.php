<?php

/**
 * Nette Framework test
 */

use Nette\Mail\Mail;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class Mail005Test extends TestCase
{

	/**
	 * Nette\Mail\Mail - textual and HTML body with attachment.
	 */
	public function testMailTextualAndHTMLBodyWithAttachment()
	{
		require __DIR__ . '/Mail.inc';



		$mail = new Mail();

		$mail->setFrom('John Doe <doe@example.com>');
		$mail->addTo('Lady Jane <jane@example.com>');
		$mail->setSubject('Hello Jane!');

		$mail->setBody('Sample text');

		$mail->setHTMLBody('<b>Sample text</b>');

		$mail->addAttachment('files/example.zip');

		$mail->send();

		$this->assertMatch(file_get_contents(__DIR__ . '/Mail.005.expect'), TestMailer::$output);
	}

}
