<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionDefaultRuleSetTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that ACL-wide rules (all Roles, Resources, and privileges) work properly.
	 */
	public function testPermissionEnsuresThatACLWideRulesAllRolesResourcesAndPrivilegesWorkProperly()
	{
		$acl = new Permission;
		$acl->allow();
		$this->assertTrue( $acl->isAllowed() );
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'somePrivilege') );

		$acl->deny();
		$this->assertFalse( $acl->isAllowed() );
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'somePrivilege') );
	}

}
