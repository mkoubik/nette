<?php

/**
 * Nette Framework test
 */

use Nette\Mail\Mail;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class MailEmail003Test extends TestCase
{

	/**
	 * Nette\Mail\Mail valid email addresses.
	 */
	public function testMailValidEmailAddresses()
	{
		require __DIR__ . '/Mail.inc';



		$mail = new Mail();

		$mail->addTo('veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylongemail@example.com');

		$mail->addCc('veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylongemail@example.com', 'John Doe');

		$mail->addBcc('veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylong name <veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylongemail@example.com>');

		$mail->send();

		$this->assertMatch( <<<EOD
		MIME-Version: 1.0
		X-Mailer: Nette Framework
		Date: %a%
		To: veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylongemail@example.com
		Cc: John Doe
			 <veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylongemail@example.com>
		Bcc: =?UTF-8?B?dmVyeXZlcnl2ZXJ5dmVyeXZlcnl2ZXJ5dmVyeXZlcnl2ZXJ5dmU=?=
			=?UTF-8?B?cnl2ZXJ5dmVyeXZlcnl2ZXJ5dmVyeXZlcnl2ZXJ5dmVyeXZlcnl2ZXI=?=
			=?UTF-8?B?eXZlcnl2ZXJ5dmVyeXZlcnlsb25nIG5hbWU=?=
			 <veryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryveryverylongemail@example.com>
		Message-ID: <%a%@%a%>
		Content-Type: text/plain; charset=UTF-8
		Content-Transfer-Encoding: 7bit
		EOD
		, TestMailer::$output );
	}

}
