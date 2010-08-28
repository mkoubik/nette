<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionDefaultDenyTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that by default denies access to everything by all.
	 */
	public function testPermissionEnsuresThatByDefaultDeniesAccessToEverythingByAll()
	{
		$acl = new Permission;
		$this->assertFalse( $acl->isAllowed() );
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'somePrivilege') );

		$acl->addRole('guest');
		$this->assertFalse( $acl->isAllowed('guest') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'somePrivilege') );
	}

}
