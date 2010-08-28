<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRemoveDefaultDenyNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removing non-existent default deny rule does nothing.
	 */
	public function testPermissionEnsuresThatRemovingNonExistentDefaultDenyRuleDoesNothing()
	{
		$acl = new Permission;
		$acl->allow();
		$acl->removeDeny();
		$this->assertTrue( $acl->isAllowed() );
	}

}
