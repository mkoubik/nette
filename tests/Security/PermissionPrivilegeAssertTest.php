<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionPrivilegeAssertTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that assertions on privileges work properly.
	 */
	public function testPermissionEnsuresThatAssertionsOnPrivilegesWorkProperly()
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
		$acl->allow(NULL, NULL, 'somePrivilege', 'trueAssertion');
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'somePrivilege') );

		$acl->allow(NULL, NULL, 'somePrivilege', 'falseAssertion');
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'somePrivilege') );
	}

}
