<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionIsAllowedNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Role and Resource parameters are specified to isAllowed().
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentRoleAndResourceParametersAreSpecifiedToIsAllowed()
	{
		try {
			$acl = new Permission;
			$acl->isAllowed('nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Role 'nonexistent' does not exist.", $e );
		}

		try {
			$acl = new Permission;
			$acl->isAllowed(NULL, 'nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'nonexistent' does not exist.", $e );
		}
	}

}
