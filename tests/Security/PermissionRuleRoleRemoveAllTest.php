<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRuleRoleRemoveAllTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removal of all Roles results in Role-specific rules being removed.
	 */
	public function testPermissionEnsuresThatRemovalOfAllRolesResultsInRoleSpecificRulesBeingRemoved()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest');
		$this->assertTrue( $acl->isAllowed('guest') );
		$acl->removeAllRoles();
		try {
			$acl->isAllowed('guest');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'guest' does not exist.", $e );
		}

		$acl->addRole('guest');
		$this->assertFalse( $acl->isAllowed('guest') );
	}

}
