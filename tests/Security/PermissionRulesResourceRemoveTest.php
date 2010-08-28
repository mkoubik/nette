<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRulesResourceRemoveTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removal of a Resource results in its rules being removed.
	 */
	public function testPermissionEnsuresThatRemovalOfAResourceResultsInItsRulesBeingRemoved()
	{
		$acl = new Permission;
		$acl->addResource('area');
		$acl->allow(NULL, 'area');
		$this->assertTrue( $acl->isAllowed(NULL, 'area') );
		$acl->removeResource('area');
		try {
			$acl->isAllowed(NULL, 'area');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'area' does not exist.", $e );
		}

		$acl->addResource('area');
		$this->assertFalse( $acl->isAllowed(NULL, 'area') );
	}

}
