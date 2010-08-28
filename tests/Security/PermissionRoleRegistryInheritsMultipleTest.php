<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryInheritsMultipleTest extends TestCase
{

	/**
	 * Nette\Security\Permission Tests basic Role multiple inheritance.
	 */
	public function testPermissionTestsBasicRoleMultipleInheritance()
	{
		$acl = new Permission;
		$acl->addRole('parent1');
		$acl->addRole('parent2');
		$acl->addRole('child', array('parent1', 'parent2'));

		$this->assertSame( array(
			'parent1',
			'parent2',
		), $acl->getRoleParents('child') );


		$this->assertTrue( $acl->roleInheritsFrom('child', 'parent1') );
		$this->assertTrue( $acl->roleInheritsFrom('child', 'parent2') );

		$acl->removeRole('parent1');
		$this->assertSame( array('parent2'), $acl->getRoleParents('child') );
		$this->assertTrue( $acl->roleInheritsFrom('child', 'parent2') );
	}

}
