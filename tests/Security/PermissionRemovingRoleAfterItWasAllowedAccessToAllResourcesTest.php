<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRemovingRoleAfterItWasAllowedAccessToAllResourcesTest extends TestCase
{

	/**
	 * Nette\Security\Permission Confirm that deleting a role after allowing access to all roles
	 */
	public function testPermissionConfirmThatDeletingARoleAfterAllowingAccessToAllRoles()
	{
		$acl = new Permission;
		$acl->addRole('test0');
		$acl->addRole('test1');
		$acl->addRole('test2');
		$acl->addResource('Test');

		$acl->allow(NULL,'Test','xxx');

		// error test
		$acl->removeRole('test0');

		// Check after fix
		$this->assertFalse( $acl->hasRole('test0') );
	}

}
