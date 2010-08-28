<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRemoveDefaultDenyTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removing the default deny rule results in default deny rule.
	 */
	public function testPermissionEnsuresThatRemovingTheDefaultDenyRuleResultsInDefaultDenyRule()
	{
		$acl = new Permission;
		$this->assertFalse( $acl->isAllowed() );
		$acl->removeDeny();
		$this->assertFalse( $acl->isAllowed() );
	}

}
