<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionPrivilegeAllowTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that a privilege allowed for all Roles upon all Resources works properly.
	 */
	public function testPermissionEnsuresThatAPrivilegeAllowedForAllRolesUponAllResourcesWorksProperly()
	{
		$acl = new Permission;
		$acl->allow(NULL, NULL, 'somePrivilege');
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'somePrivilege') );
	}

}
