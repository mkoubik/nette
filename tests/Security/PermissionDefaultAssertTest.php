<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionDefaultAssertTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that the default rule obeys its assertion.
	 */
	public function testPermissionEnsuresThatTheDefaultRuleObeysItsAssertion()
	{
		function falseAssertion()
		{
			return FALSE;
		}



		$acl = new Permission;
		$acl->deny(NULL, NULL, NULL, 'falseAssertion');
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'somePrivilege') );
	}

}
