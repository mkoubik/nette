<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceAddAndGetOneTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that basic addition and retrieval of a single Resource works.
	 */
	public function testPermissionEnsuresThatBasicAdditionAndRetrievalOfASingleResourceWorks()
	{
		$acl = new Permission;
		$this->assertFalse( $acl->hasResource('area') );

		$acl->addResource('area');
		$this->assertTrue( $acl->hasResource('area') );

		$acl->removeResource('area');
		$this->assertFalse( $acl->hasResource('area') );
	}

}
