<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceRemoveAllTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that removal of all Resources works.
	 */
	public function testPermissionEnsuresThatRemovalOfAllResourcesWorks()
	{
		$acl = new Permission;
		$acl->addResource('area');
		$acl->removeAllResources();
		$this->assertFalse( $acl->hasResource('area') );
	}

}
