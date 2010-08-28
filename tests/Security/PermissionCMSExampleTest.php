<?php

/**
 * Nette Framework test
 */

use Nette\Security\Permission;




/**
 * @package    Nette\Security
 * @subpackage UnitTests
 */
class PermissionCMSExampleTest extends TestCase
{

	/**
	 * Nette\Security\Permission Ensures that an example for a content management system is operable.
	 */
	public function testPermissionEnsuresThatAnExampleForAContentManagementSystemIsOperable()
	{
		$acl = new Permission;
		$acl->addRole('guest');
		$acl->addRole('staff', 'guest');  // staff inherits permissions from guest
		$acl->addRole('editor', 'staff'); // editor inherits permissions from staff
		$acl->addRole('administrator');

		// Guest may only view content
		$acl->allow('guest', NULL, 'view');

		// Staff inherits view privilege from guest, but also needs additional privileges
		$acl->allow('staff', NULL, array('edit', 'submit', 'revise'));

		// Editor inherits view, edit, submit, and revise privileges, but also needs additional privileges
		$acl->allow('editor', NULL, array('publish', 'archive', 'delete'));

		// Administrator inherits nothing but is allowed all privileges
		$acl->allow('administrator');

		// Access control checks based on above permission sets

		$this->assertTrue( $acl->isAllowed('guest', NULL, 'view') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'edit') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'submit') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'revise') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'publish') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'archive') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'delete') );
		$this->assertFalse( $acl->isAllowed('guest', NULL, 'unknown') );
		$this->assertFalse( $acl->isAllowed('guest') );

		$this->assertTrue( $acl->isAllowed('staff', NULL, 'view') );
		$this->assertTrue( $acl->isAllowed('staff', NULL, 'edit') );
		$this->assertTrue( $acl->isAllowed('staff', NULL, 'submit') );
		$this->assertTrue( $acl->isAllowed('staff', NULL, 'revise') );
		$this->assertFalse( $acl->isAllowed('staff', NULL, 'publish') );
		$this->assertFalse( $acl->isAllowed('staff', NULL, 'archive') );
		$this->assertFalse( $acl->isAllowed('staff', NULL, 'delete') );
		$this->assertFalse( $acl->isAllowed('staff', NULL, 'unknown') );
		$this->assertFalse( $acl->isAllowed('staff') );

		$this->assertTrue( $acl->isAllowed('editor', NULL, 'view') );
		$this->assertTrue( $acl->isAllowed('editor', NULL, 'edit') );
		$this->assertTrue( $acl->isAllowed('editor', NULL, 'submit') );
		$this->assertTrue( $acl->isAllowed('editor', NULL, 'revise') );
		$this->assertTrue( $acl->isAllowed('editor', NULL, 'publish') );
		$this->assertTrue( $acl->isAllowed('editor', NULL, 'archive') );
		$this->assertTrue( $acl->isAllowed('editor', NULL, 'delete') );
		$this->assertFalse( $acl->isAllowed('editor', NULL, 'unknown') );
		$this->assertFalse( $acl->isAllowed('editor') );

		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'view') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'edit') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'submit') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'revise') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'publish') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'archive') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'delete') );
		$this->assertTrue( $acl->isAllowed('administrator', NULL, 'unknown') );
		$this->assertTrue( $acl->isAllowed('administrator') );

		// Some checks on specific areas, which inherit access controls from the root ACL node
		$acl->addResource('newsletter');
		$acl->addResource('pending', 'newsletter');
		$acl->addResource('gallery');
		$acl->addResource('profiles', 'gallery');
		$acl->addResource('config');
		$acl->addResource('hosts', 'config');
		$this->assertTrue( $acl->isAllowed('guest', 'pending', 'view') );
		$this->assertTrue( $acl->isAllowed('staff', 'profiles', 'revise') );
		$this->assertTrue( $acl->isAllowed('staff', 'pending', 'view') );
		$this->assertTrue( $acl->isAllowed('staff', 'pending', 'edit') );
		$this->assertFalse( $acl->isAllowed('staff', 'pending', 'publish') );
		$this->assertFalse( $acl->isAllowed('staff', 'pending') );
		$this->assertFalse( $acl->isAllowed('editor', 'hosts', 'unknown') );
		$this->assertTrue( $acl->isAllowed('administrator', 'pending') );

		// Add a new group, marketing, which bases its permissions on staff
		$acl->addRole('marketing', 'staff');

		// Refine the privilege sets for more specific needs

		// Allow marketing to publish and archive newsletters
		$acl->allow('marketing', 'newsletter', array('publish', 'archive'));

		// Allow marketing to publish and archive latest news
		$acl->addResource('news');
		$acl->addResource('latest', 'news');
		$acl->allow('marketing', 'latest', array('publish', 'archive'));

		// Deny staff (and marketing, by inheritance) rights to revise latest news
		$acl->deny('staff', 'latest', 'revise');

		// Deny everyone access to archive news announcements
		$acl->addResource('announcement', 'news');
		$acl->deny(NULL, 'announcement', 'archive');

		// Access control checks for the above refined permission sets

		$this->assertTrue( $acl->isAllowed('marketing', NULL, 'view') );
		$this->assertTrue( $acl->isAllowed('marketing', NULL, 'edit') );
		$this->assertTrue( $acl->isAllowed('marketing', NULL, 'submit') );
		$this->assertTrue( $acl->isAllowed('marketing', NULL, 'revise') );
		$this->assertFalse( $acl->isAllowed('marketing', NULL, 'publish') );
		$this->assertFalse( $acl->isAllowed('marketing', NULL, 'archive') );
		$this->assertFalse( $acl->isAllowed('marketing', NULL, 'delete') );
		$this->assertFalse( $acl->isAllowed('marketing', NULL, 'unknown') );
		$this->assertFalse( $acl->isAllowed('marketing') );

		$this->assertTrue( $acl->isAllowed('marketing', 'newsletter', 'publish') );
		$this->assertFalse( $acl->isAllowed('staff', 'pending', 'publish') );
		$this->assertTrue( $acl->isAllowed('marketing', 'pending', 'publish') );
		$this->assertTrue( $acl->isAllowed('marketing', 'newsletter', 'archive') );
		$this->assertFalse( $acl->isAllowed('marketing', 'newsletter', 'delete') );
		$this->assertFalse( $acl->isAllowed('marketing', 'newsletter') );

		$this->assertTrue( $acl->isAllowed('marketing', 'latest', 'publish') );
		$this->assertTrue( $acl->isAllowed('marketing', 'latest', 'archive') );
		$this->assertFalse( $acl->isAllowed('marketing', 'latest', 'delete') );
		$this->assertFalse( $acl->isAllowed('marketing', 'latest', 'revise') );
		$this->assertFalse( $acl->isAllowed('marketing', 'latest') );

		$this->assertFalse( $acl->isAllowed('marketing', 'announcement', 'archive') );
		$this->assertFalse( $acl->isAllowed('staff', 'announcement', 'archive') );
		$this->assertFalse( $acl->isAllowed('administrator', 'announcement', 'archive') );

		$this->assertFalse( $acl->isAllowed('staff', 'latest', 'publish') );
		$this->assertFalse( $acl->isAllowed('editor', 'announcement', 'archive') );

		// Remove some previous permission specifications

		// Marketing can no longer publish and archive newsletters
		$acl->removeAllow('marketing', 'newsletter', array('publish', 'archive'));

		// Marketing can no longer archive the latest news
		$acl->removeAllow('marketing', 'latest', 'archive');

		// Now staff (and marketing, by inheritance) may revise latest news
		$acl->removeDeny('staff', 'latest', 'revise');

		// Access control checks for the above refinements

		$this->assertFalse( $acl->isAllowed('marketing', 'newsletter', 'publish') );
		$this->assertFalse( $acl->isAllowed('marketing', 'newsletter', 'archive') );

		$this->assertFalse( $acl->isAllowed('marketing', 'latest', 'archive') );

		$this->assertTrue( $acl->isAllowed('staff', 'latest', 'revise') );
		$this->assertTrue( $acl->isAllowed('marketing', 'latest', 'revise') );

		// Grant marketing all permissions on the latest news
		$acl->allow('marketing', 'latest');

		// Access control checks for the above refinement
		$this->assertTrue( $acl->isAllowed('marketing', 'latest', 'archive') );
		$this->assertTrue( $acl->isAllowed('marketing', 'latest', 'publish') );
		$this->assertTrue( $acl->isAllowed('marketing', 'latest', 'edit') );
		$this->assertTrue( $acl->isAllowed('marketing', 'latest') );
	}

}
