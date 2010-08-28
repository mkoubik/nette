<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleDefaultRuleSetPrivilegeTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that ACL-wide rules apply to privileges for a particular Role.
	 */
	public function testPermissionEnsuresThatACLWideRulesApplyToPrivilegesForAParticularRole()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest');
		$this->assertTrue( $acl->isAllowed('guest', NULL, 'somePrivilege') );
		$acl->deny('guest');
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'somePrivilege') );
	}

}
