<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRolePrivilegeAssertTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that assertions on privileges work properly for a particular Role.
	 */
	public function testPermissionEnsuresThatAssertionsOnPrivilegesWorkProperlyForAParticularRole()
	{
		function falseAssertion()
		{
			return FALSE;
		}

		function trueAssertion()
		{
			return TRUE;
		}


		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest', NULL, 'somePrivilege', 'trueAssertion');
		$this->assertTrue( $acl->isAllowed('guest', NULL, 'somePrivilege') );
		$acl->allow('guest', NULL, 'somePrivilege', 'falseAssertion');
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'somePrivilege') );
	}

}
