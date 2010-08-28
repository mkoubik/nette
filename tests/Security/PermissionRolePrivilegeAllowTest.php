<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRolePrivilegeAllowTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that a privilege allowed for a particular Role upon all Resources works properly.
	 */
	public function testPermissionEnsuresThatAPrivilegeAllowedForAParticularRoleUponAllResourcesWorksProperly()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest', NULL, 'somePrivilege');
		$this->assertTrue( $acl->isAllowed('guest', NULL, 'somePrivilege') );
	}

}
