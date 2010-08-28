<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRulesResourceRemoveAllTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removal of all Resources results in Resource-specific rules being removed.
	 */
	public function testPermissionEnsuresThatRemovalOfAllResourcesResultsInResourceSpecificRulesBeingRemoved()
	{
		$acl = new Permission;
		$acl->addResource('area');
		$acl->allow(NULL, 'area');
		$this->assertTrue( $acl->isAllowed(NULL, 'area') );
		$acl->removeAllResources();
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
