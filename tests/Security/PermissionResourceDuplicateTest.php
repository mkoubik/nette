<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionResourceDuplicateTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that the same Resource cannot be added more than once.
	 */
	public function testPermissionEnsuresThatTheSameResourceCannotBeAddedMoreThanOnce()
	{
		try {
			$acl = new Permission;
			$acl->addResource('area');
			$acl->addResource('area');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidStateException', "Resource 'area' already exists in the list.", $e );
		}
	}

}
