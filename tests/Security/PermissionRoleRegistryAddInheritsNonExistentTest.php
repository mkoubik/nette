<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryAddInheritsNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Role is specified as a parent upon Role addition.
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentRoleIsSpecifiedAsAParentUponRoleAddition()
	{
		$acl = new Permission;
		try {
			$acl->addRole('guest', 'nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'nonexistent' does not exist.", $e );
		}
	}

}
