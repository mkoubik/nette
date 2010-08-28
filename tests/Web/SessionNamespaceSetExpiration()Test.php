<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionNamespaceSetExpirationTest extends TestCase
{

	/**
	 * Nette\Web\SessionNamespace::setExpiration()	 
	 */
	public function testSessionNamespaceSetExpiration()
	{
		ob_start();

		$session = new Session;

		// try to expire whole namespace
		$namespace = $session->getNamespace('expire');
		$namespace->a = 'apple';
		$namespace->p = 'pear';
		$namespace['o'] = 'orange';
		$namespace->setExpiration('+ 2 seconds');

		$session->close();
		sleep(3);
		$session->start();

		$namespace = $session->getNamespace('expire');
		$this->assertSame( '', http_build_query($namespace->getIterator()) );


		// try to expire only 1 of the keys
		$namespace = $session->getNamespace('expireSingle');
		$namespace->setExpiration(2, 'g');
		$namespace->g = 'guava';
		$namespace->p = 'plum';

		$session->close();
		sleep(3);
		$session->start();

		$namespace = $session->getNamespace('expireSingle');
		$this->assertSame( 'p=plum', http_build_query($namespace->getIterator()) );
	}

}
