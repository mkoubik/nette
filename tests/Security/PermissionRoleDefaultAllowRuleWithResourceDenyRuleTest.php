<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleDefaultAllowRuleWithResourceDenyRuleTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that for a particular Role, a deny rule on a specific Resource is honored before an allow rule
	 */
	public function testPermissionEnsuresThatForAParticularRoleADenyRuleOnASpecificResourceIsHonoredBeforeAnAllowRule()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->addRole('staff', 'guest');
		$acl->addResource('area1');
		$acl->addResource('area2');
		$acl->deny();
		$acl->allow('staff');
		$acl->deny('staff', array('area1', 'area2'));
		$this->assertFalse( $acl->isAllowed('staff', 'area1') );
	}

}
