<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRemoveDefaultAllowNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removing non-existent default allow rule does nothing.
	 */
	public function testPermissionEnsuresThatRemovingNonExistentDefaultAllowRuleDoesNothing()
	{
		$acl = new Permission;
		$acl->removeAllow();
		$this->assertFalse( $acl->isAllowed() );
	}

}
