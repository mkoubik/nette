<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRolePrivilegeDenyTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that a privilege denied for a particular Role upon all Resources works properly.
	 */
	public function testPermissionEnsuresThatAPrivilegeDeniedForAParticularRoleUponAllResourcesWorksProperly()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest');
		$acl->deny('guest', NULL, 'somePrivilege');
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'somePrivilege') );
	}

}
