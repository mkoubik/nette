<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryRemoveOneNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Role is specified for removal.
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentRoleIsSpecifiedForRemoval()
	{
		$acl = new Permission;
		try {
			$acl->removeRole('nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'nonexistent' does not exist.", $e );
		}
	}

}
