<?php

/**
 * Nette Framework test
 */

use Nette\Web\User,
	Nette\Security\IAuthenticator,
	Nette\Security\AuthenticationException,
	Nette\Security\Identity;




class AuthenticationHandler implements IAuthenticator
{
	/*
	 * @param  array
	 * @return IIdentity
	 * @throws AuthenticationException
	 */
	function authenticate(array $credentials)
	{
		if ($credentials[self::USERNAME] !== 'john') {
			throw new AuthenticationException('Unknown user', self::IDENTITY_NOT_FOUND);
		}

		if ($credentials[self::PASSWORD] !== 'xxx') {
			throw new AuthenticationException('Password not match', self::INVALID_CREDENTIAL);
		}

		return new Identity('John Doe', 'admin');
	}

}



function onLoggedIn($user) {
	// TODO: add test
}



function onLoggedOut($user) {
	// TODO: add test
}



/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UserAuthenticationTest extends TestCase
{

	/**
	 * Nette\Web\User authentication.
	 */
	public function testUserAuthentication()
	{
		// Setup environment
		$_COOKIE = array();
		ob_start();



		$user = new User;
		$user->onLoggedIn[] = 'onLoggedIn';
		$user->onLoggedOut[] = 'onLoggedOut';


		$this->assertFalse( $user->isLoggedIn(), 'isLoggedIn?' );
		$this->assertNull( $user->getIdentity(), 'getIdentity' );
		$this->assertNull( $user->getId(), 'getId' );



		// authenticate
		try {
			// login without handler
			$user->login('jane', '');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Service 'Nette\\Security\\IAuthenticator' not found.", $e );
		}

		$handler = new AuthenticationHandler;
		$user->setAuthenticationHandler($handler);

		try {
			// login as jane
			$user->login('jane', '');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\Security\AuthenticationException', 'Unknown user', $e );
		}

		try {
			// login as john
			$user->login('john', '');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('Nette\Security\AuthenticationException', 'Password not match', $e );
		}

		// login as john#2
		$user->login('john', 'xxx');
		$this->assertTrue( $user->isLoggedIn(), 'isLoggedIn?' );
		$this->assertEqual( new Nette\Security\Identity('John Doe', 'admin'), $user->getIdentity(), 'getIdentity' );
		$this->assertSame( 'John Doe', $user->getId(), 'getId' );




		// log out
		// logging out...
		$user->logout(FALSE);

		$this->assertFalse( $user->isLoggedIn(), 'isLoggedIn?' );
		$this->assertEqual( new Nette\Security\Identity('John Doe', 'admin'), $user->getIdentity(), 'getIdentity' );


		// logging out and clearing identity...
		$user->logout(TRUE);

		$this->assertFalse( $user->isLoggedIn(), 'isLoggedIn?' );
		$this->assertNull( $user->getIdentity(), 'getIdentity' );




		// namespace
		// login as john#2?
		$user->login('john', 'xxx');
		$this->assertTrue( $user->isLoggedIn(), 'isLoggedIn?' );


		// setNamespace(...)
		$user->setNamespace('other');

		$this->assertFalse( $user->isLoggedIn(), 'isLoggedIn?' );
		$this->assertNull( $user->getIdentity(), 'getIdentity' );
	}

}
