<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryInheritsTest extends TestCase
{

	/**
	 * Nette\Security\Permission Tests basic Role inheritance.
	 */
	public function testPermissionTestsBasicRoleInheritance()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->addRole('member', 'guest');
		$acl->addRole('editor', 'member');
		$this->assertSame( array(), $acl->getRoleParents('guest') );
		$this->assertSame( array('guest'), $acl->getRoleParents('member') );
		$this->assertSame( array('member'), $acl->getRoleParents('editor') );


		$this->assertTrue( $acl->roleInheritsFrom('member', 'guest', TRUE) );
		$this->assertTrue( $acl->roleInheritsFrom('editor', 'member', TRUE) );
		$this->assertTrue( $acl->roleInheritsFrom('editor', 'guest') );
		$this->assertFalse( $acl->roleInheritsFrom('editor', 'guest', TRUE) );
		$this->assertFalse( $acl->roleInheritsFrom('guest', 'member') );
		$this->assertFalse( $acl->roleInheritsFrom('member', 'editor') );
		$this->assertFalse( $acl->roleInheritsFrom('guest', 'editor') );

		$acl->removeRole('member');
		$this->assertSame( array(), $acl->getRoleParents('editor') );
		$this->assertFalse( $acl->roleInheritsFrom('editor', 'guest') );
	}

}
