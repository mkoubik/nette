<?php

/**
 * Nette Framework test
 */

use Nette\Web\User,
	Nette\Security\IAuthenticator,
	Nette\Security\AuthenticationException,
	Nette\Security\Identity,
	Nette\Security\IAuthorizator;




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

		return new Identity('John Doe', array('admin'));
	}

}



class AuthorizationHandler implements IAuthorizator
{
	/**
	 * @param  string  role
	 * @param  string  resource
	 * @param  string  privilege
	 * @return bool
	 */
	function isAllowed($role = self::ALL, $resource = self::ALL, $privilege = self::ALL)
	{
		return $role === 'admin' && strpos($resource, 'jany') === FALSE;
	}

}



/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UserAuthorizationTest extends TestCase
{

	/**
	 * Nette\Web\User authorization.
	 */
	public function testUserAuthorization()
	{
		// Setup environment
		$_COOKIE = array();
		ob_start();



		$user = new User;

		// guest
		$this->assertFalse( $user->isLoggedIn(), 'isLoggedIn?' );


		$this->assertSame( array('guest'), $user->getRoles(), 'getRoles()' );
		$this->assertFalse( $user->isInRole('admin'), 'is admin?' );
		$this->assertTrue( $user->isInRole('guest'), 'is guest?' );



		// authenticated
		$handler = new AuthenticationHandler;
		$user->setAuthenticationHandler($handler);

		// login as john
		$user->login('john', 'xxx');

		$this->assertTrue( $user->isLoggedIn(), 'isLoggedIn?' );
		$this->assertSame( array('admin'), $user->getRoles(), 'getRoles()' );
		$this->assertTrue( $user->isInRole('admin'), 'is admin?' );
		$this->assertFalse( $user->isInRole('guest'), 'is guest?' );


		// authorization
		try {
			$user->isAllowed('delete_file');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Service 'Nette\\Security\\IAuthorizator' not found.", $e );
		}

		$handler = new AuthorizationHandler;
		$user->setAuthorizationHandler($handler);

		$this->assertTrue( $user->isAllowed('delete_file'), "isAllowed('delete_file')?" );
		$this->assertFalse( $user->isAllowed('sleep_with_jany'), "isAllowed('sleep_with_jany')?" );



		// log out
		// logging out...
		$user->logout(FALSE);

		$this->assertFalse( $user->isAllowed('delete_file'), "isAllowed('delete_file')?" );
	}

}
