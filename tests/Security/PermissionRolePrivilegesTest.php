<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRolePrivilegesTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that multiple privileges work properly for a particular Role.
	 */
	public function testPermissionEnsuresThatMultiplePrivilegesWorkProperlyForAParticularRole()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest', NULL, array('p1', 'p2', 'p3'));
		$this->assertTrue( $acl->isAllowed('guest', NULL, 'p1') );
		$this->assertTrue( $acl->isAllowed('guest', NULL, 'p2') );
		$this->assertTrue( $acl->isAllowed('guest', NULL, 'p3') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'p4') );
		$acl->deny('guest', NULL, 'p1');
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'p1') );
		$acl->deny('guest', NULL, array('p2', 'p3'));
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'p2') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'p3') );
	}

}
