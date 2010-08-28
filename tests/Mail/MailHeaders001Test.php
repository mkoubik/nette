<?php

/**
 * Nette Framework test
 */

use Nette\Mail\Mail;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class MailHeaders001Test extends TestCase
{

	/**
	 * Nette\Mail\Mail invalid headers.
	 */
	public function testMailInvalidHeaders()
	{
		require __DIR__ . '/Mail.inc';



		$mail = new Mail();

		try {
			$mail->setHeader('', 'value');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Header name must be non-empty alphanumeric string, '' given.", $e );
		}

		try {
			$mail->setHeader(' name', 'value');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Header name must be non-empty alphanumeric string, ' name' given.", $e );
		}

		try {
			$mail->setHeader('n*ame', 'value');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Header name must be non-empty alphanumeric string, 'n*ame' given.", $e );
		}
	}

}
