<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRulesRemoveTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensure that basic rule removal works.
	 */
	public function testPermissionEnsureThatBasicRuleRemovalWorks()
	{
		$acl = new Permission;
		$acl->allow(NULL, NULL, array('privilege1', 'privilege2'));
		$this->assertFalse( $acl->isAllowed() );
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'privilege1') );
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'privilege2') );
		$acl->removeAllow(NULL, NULL, 'privilege1');
		$this->assertFalse( $acl->isAllowed(NULL, NULL, 'privilege1') );
		$this->assertTrue( $acl->isAllowed(NULL, NULL, 'privilege2') );
	}

}
