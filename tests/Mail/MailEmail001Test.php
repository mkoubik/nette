<?php

/**
 * Nette Framework test
 */

use Nette\Mail\Mail;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class MailEmail001Test extends TestCase
{

	/**
	 * Nette\Mail\Mail invalid email addresses.
	 */
	public function testMailInvalidEmailAddresses()
	{
		$mail = new Mail();

		try {
			// From
			$mail->setFrom('John Doe <doe@example. com>');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address 'doe@example. com' is not valid.", $e );
		}


		try {
			$mail->setFrom('John Doe <>');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address '' is not valid.", $e );
		}


		try {
			$mail->setFrom('John Doe <doe@examplecom>');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address 'doe@examplecom' is not valid.", $e );
		}


		try {
			$mail->setFrom('John Doe <doe@examplecom>');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address 'doe@examplecom' is not valid.", $e );
		}


		try {
			$mail->setFrom('John Doe');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address 'John Doe' is not valid.", $e );
		}


		try {
			$mail->setFrom('doe;@examplecom');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address 'doe;@examplecom' is not valid.", $e );
		}


		try {
			// addReplyTo
			$mail->addReplyTo('@');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address '@' is not valid.", $e );
		}


		try {
			// addTo
			$mail->addTo('@');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address '@' is not valid.", $e );
		}


		try {
			// addCc
			$mail->addCc('@');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address '@' is not valid.", $e );
		}


		try {
			// addBcc
			$mail->addBcc('@');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Email address '@' is not valid.", $e );
		}
	}

}
