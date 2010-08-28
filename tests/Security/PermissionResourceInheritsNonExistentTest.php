<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceInheritsNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Resource is specified to each parameter of inherits().
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentResourceIsSpecifiedToEachParameterOfInherits()
	{
		$acl = new Permission;
		$acl->addResource('area');
		try {
			$acl->resourceInheritsFrom('nonexistent', 'area');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'nonexistent' does not exist.", $e );
		}

		try {
			$acl->resourceInheritsFrom('area', 'nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'nonexistent' does not exist.", $e );
		}
	}

}
