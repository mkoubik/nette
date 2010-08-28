<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceAddInheritsNonExistentTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an exception is thrown when a non-existent Resource is specified as a parent upon Resource addition.
	 */
	public function testPermissionEnsuresThatAnExceptionIsThrownWhenANonExistentResourceIsSpecifiedAsAParentUponResourceAddition()
	{
		$acl = new Permission;
		try {
			$acl->addResource('area', 'nonexistent');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'nonexistent' does not exist.", $e );
		}
	}

}
