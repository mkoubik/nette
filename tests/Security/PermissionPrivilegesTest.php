<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionPrivilegesTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that multiple privileges work properly.
	 */
	public function testPermissionEnsuresThatMultiplePrivilegesWorkProperly()
	{
		$acl = new Permission;
		$acl->allow(NULL, NULL, array('p1', 'p2', 'p3'));
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'p1') );
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'p2') );
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'p3') );
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'p4') );
		$acl->deny(NULL, NULL, 'p1');
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'p1') );
		$acl->deny(NULL, NULL, array('p2', 'p3'));
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'p2') );
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'p3') );
	}

}
