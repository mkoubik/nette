<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRemoveDefaultAllowTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removing the default allow rule results in default deny rule being assigned.
	 */
	public function testPermissionEnsuresThatRemovingTheDefaultAllowRuleResultsInDefaultDenyRuleBeingAssigned()
	{
		$acl = new Permission;
		$acl->allow();
		$this->assertTrue( $acl->isAllowed() );
		$acl->removeAllow();
		$this->assertFalse( $acl->isAllowed() );
	}

}
