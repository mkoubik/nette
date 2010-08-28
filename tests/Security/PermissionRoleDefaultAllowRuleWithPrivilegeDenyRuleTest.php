<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleDefaultAllowRuleWithPrivilegeDenyRuleTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that for a particular Role, a deny rule on a specific privilege is honored before an allow
	 */
	public function testPermissionEnsuresThatForAParticularRoleADenyRuleOnASpecificPrivilegeIsHonoredBeforeAnAllow()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->addRole('staff', 'guest');
		$acl->deny();
		$acl->allow('staff');
		$acl->deny('staff', NULL, array('privilege1', 'privilege2'));
		$this->assertFalse( $acl->isAllowed('staff', NULL, 'privilege1') );
	}

}
