<?php

/**
 * Nette Framework test
 */

use Nette\Mail\Mail;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class Mail001Test extends TestCase
{

	/**
	 * Nette\Mail\Mail - textual body.
	 */
	public function testMailTextualBody()
	{
		require __DIR__ . '/Mail.inc';



		$mail = new Mail();

		$mail->setFrom('John Doe <doe@example.com>');
		$mail->addTo('Lady Jane <jane@example.com>');
		$mail->setSubject('Hello Jane!');

		$mail->setBody('Žluťoučký kůň');

		$mail->send();

		$this->assertMatch( <<<EOD
		MIME-Version: 1.0
		X-Mailer: Nette Framework
		Date: %a%
		From: John Doe <doe@example.com>
		To: Lady Jane <jane@example.com>
		Subject: Hello Jane!
		Message-ID: <%h%@localhost>
		Content-Type: text/plain; charset=UTF-8
		Content-Transfer-Encoding: 8bit

		Žluťoučký kůň
		EOD
		, TestMailer::$output );
	}

}
