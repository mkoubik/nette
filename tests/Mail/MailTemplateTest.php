<?php

/**
 * Nette Framework test
 */

use Nette\Mail\Mail,
	Nette\Environment,
	Nette\Templates\Template,
	Nette\Templates\LatteFilter;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class MailTemplateTest extends TestCase
{

	/**
	 * Nette\Mail\Mail with template.
	 */
	public function testMailWithTemplate()
	{
		require __DIR__ . '/Mail.inc';



		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Environment::setVariable('tempDir', __DIR__ . '/tmp');



		$mail = new Mail();
		$mail->addTo('Lady Jane <jane@example.com>');

		$mail->htmlBody = new Template;
		$mail->htmlBody->setFile('files/template.phtml');
		$mail->htmlBody->registerFilter(new LatteFilter);

		$mail->send();

		$this->assertMatch(file_get_contents(__DIR__ . '/Mail.template.expect'), TestMailer::$output);
	}

}
