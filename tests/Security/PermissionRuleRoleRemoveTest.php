<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRuleRoleRemoveTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removal of a Role results in its rules being removed.
	 */
	public function testPermissionEnsuresThatRemovalOfARoleResultsInItsRulesBeingRemoved()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->allow('guest');
		$this->assertTrue( $acl->isAllowed('guest') );
		$acl->removeRole('guest');
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
