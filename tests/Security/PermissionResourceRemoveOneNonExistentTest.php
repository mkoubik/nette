<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceRemoveOneNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Resource is specified for removal.
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentResourceIsSpecifiedForRemoval()
	{
		$acl = new Permission;
		try {
			$acl->removeResource('nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'nonexistent' does not exist.", $e );
		}
	}

}
