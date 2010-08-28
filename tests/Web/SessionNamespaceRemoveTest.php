<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionNamespaceRemoveTest extends TestCase
{

	/**
	 * Nette\Web\SessionNamespace remove.
	 */
	public function testSessionNamespaceRemove()
	{
		$session = new Session;
		$namespace = $session->getNamespace('three');
		$namespace->a = 'apple';
		$namespace->p = 'papaya';
		$namespace['c'] = 'cherry';

		$namespace = $session->getNamespace('three');
		$this->assertSame( 'a=apple&p=papaya&c=cherry', http_build_query($namespace->getIterator()) );


		// removing
		$namespace->remove();
		$this->assertSame( '', http_build_query($namespace->getIterator()) );
	}

}
