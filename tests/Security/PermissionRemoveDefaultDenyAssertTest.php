<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRemoveDefaultDenyAssertTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removing the default deny rule results in assertion method being removed.
	 */
	public function testPermissionEnsuresThatRemovingTheDefaultDenyRuleResultsInAssertionMethodBeingRemoved()
	{
		function falseAssertion()
		{
			return FALSE;
		}



		$acl = new Permission;
		$acl->deny(NULL, NULL, NULL, 'falseAssertion');
		$this->assertTrue( $acl->isAllowed() );
		$acl->removeDeny();
		$this->assertFalse( $acl->isAllowed() );
	}

}
