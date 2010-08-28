<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryDuplicateTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that the same Role cannot be registered more than once to the registry.
	 */
	public function testPermissionEnsuresThatTheSameRoleCannotBeRegisteredMoreThanOnceToTheRegistry()
	{
		$acl = new Permission;
		try {
			$acl->addRole('guest');
			$acl->addRole('guest');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'guest' already exists in the list.", $e );
		}
	}

}
