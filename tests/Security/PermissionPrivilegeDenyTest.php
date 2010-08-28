<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionPrivilegeDenyTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that a privilege denied for all Roles upon all Resources works properly.
	 */
	public function testPermissionEnsuresThatAPrivilegeDeniedForAllRolesUponAllResourcesWorksProperly()
	{
		$acl = new Permission;
		$acl->allow();
		$acl->deny(NULL, NULL, 'somePrivilege');
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'somePrivilege') );
	}

}
