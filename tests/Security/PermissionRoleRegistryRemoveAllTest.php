<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryRemoveAllTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removal of all Roles works.
	 */
	public function testPermissionEnsuresThatRemovalOfAllRolesWorks()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->removeAllRoles();
		$this->assertFalse( $acl->hasRole('guest') );
	}

}
