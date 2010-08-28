<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryAddAndGetOneTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that basic addition and retrieval of a single Role works.
	 */
	public function testPermissionEnsuresThatBasicAdditionAndRetrievalOfASingleRoleWorks()
	{
		$acl = new Permission;
		$this->assertFalse( $acl->hasRole('guest') );

		$acl->addRole('guest');
		$this->assertTrue( $acl->hasRole('guest') );

		$acl->removeRole('guest');
		$this->assertFalse( $acl->hasRole('guest') );
	}

}
