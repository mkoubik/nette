<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionNamespacesTest extends TestCase
{

	/**
	 * Nette\Web\Session namespaces.
	 */
	public function testSessionNamespaces()
	{
		ob_start();

		$session = new Session;
		$this->assertFalse( $session->hasNamespace('trees'), 'hasNamespace() should have returned FALSE for a namespace with no keys set' );

		$namespace = $session->getNamespace('trees');
		$this->assertFalse( $session->hasNamespace('trees'), 'hasNamespace() should have returned FALSE for a namespace with no keys set' );

		$namespace->hello = 'world';
		$this->assertTrue( $session->hasNamespace('trees'), 'hasNamespace() should have returned TRUE for a namespace with keys set' );

		$namespace = $session->getNamespace('default');
		$this->assertTrue( $namespace instanceof Nette\Web\SessionNamespace );

		try {
			$namespace = $session->getNamespace('');
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', 'Session namespace must be a non-empty string.', $e );
		}
	}

}
