<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionRoleRegistryInheritsNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Role is specified to each parameter of inherits().
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentRoleIsSpecifiedToEachParameterOfInherits()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		try {
			$acl->roleInheritsFrom('nonexistent', 'guest');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'nonexistent' does not exist.", $e );
		}

		try {
			$acl->roleInheritsFrom('guest', 'nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'nonexistent' does not exist.", $e );
		}
	}

}
