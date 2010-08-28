<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionRegenerateIdTest extends TestCase
{

	/**
	 * Nette\Web\Session::regenerateId()
	 */
	public function testSessionRegenerateId()
	{
		$session = new Session;
		$session->start();
		$oldId = $session->getId();
		$session->regenerateId();
		$newId = $session->getId();
		$this->assertTrue( $newId != $oldId );
	}

}
