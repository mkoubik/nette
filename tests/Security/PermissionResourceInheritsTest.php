<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceInheritsTest extends TestCase
{

	/**
	 * Nette\Security\Permission Tests basic Resource inheritance.
	 */
	public function testPermissionTestsBasicResourceInheritance()
	{
		$acl = new Permission;
		$acl->addResource('city');
		$acl->addResource('building', 'city');
		$acl->addResource('room', 'building');

		$this->assertTrue( $acl->resourceInheritsFrom('building', 'city', TRUE) );
		$this->assertTrue( $acl->resourceInheritsFrom('room', 'building', TRUE) );
		$this->assertTrue( $acl->resourceInheritsFrom('room', 'city') );
		$this->assertFalse( $acl->resourceInheritsFrom('room', 'city', TRUE) );
		$this->assertFalse( $acl->resourceInheritsFrom('city', 'building') );
		$this->assertFalse( $acl->resourceInheritsFrom('building', 'room') );
		$this->assertFalse( $acl->resourceInheritsFrom('city', 'room') );

		$acl->removeResource('building');
		$this->assertFalse( $acl->hasResource('room') );
	}

}
