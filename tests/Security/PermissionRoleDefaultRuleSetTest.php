<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleDefaultRuleSetTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that ACL-wide rules (all Resources and privileges) work properly for a particular Role.
	 */
	public function testPermissionEnsuresThatACLWideRulesAllResourcesAndPrivilegesWorkProperlyForAParticularRole()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest');
		$this->assertTrue( $acl->isAllowed('guest') );
		$acl->deny('guest');
		$this->assertFalse( $acl->isAllowed('guest') );
	}

}
