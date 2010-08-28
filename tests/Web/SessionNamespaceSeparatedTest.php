<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionNamespaceSeparatedTest extends TestCase
{

	/**
	 * Nette\Web\SessionNamespace separated space.
	 */
	public function testSessionNamespaceSeparatedSpace()
	{
		$session = new Session;
		$namespace1 = $session->getNamespace('namespace1');
		$namespace1b = $session->getNamespace('namespace1');
		$namespace2 = $session->getNamespace('namespace2');
		$namespace2b = $session->getNamespace('namespace2');
		$namespace3 = $session->getNamespace('default');
		$namespace3b = $session->getNamespace('default');
		$namespace1->a = 'apple';
		$namespace2->a = 'pear';
		$namespace3->a = 'orange';
		$this->assertTrue( $namespace1->a !== $namespace2->a && $namespace1->a !== $namespace3->a && $namespace2->a !== $namespace3->a );
		$this->assertTrue( $namespace1->a === $namespace1b->a );
		$this->assertTrue( $namespace2->a === $namespace2b->a );
		$this->assertTrue( $namespace3->a === $namespace3b->a );
	}

}
