<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionNamespaceUndefinedTest extends TestCase
{

	/**
	 * Nette\Web\SessionNamespace undefined property.
	 */
	public function testSessionNamespaceUndefinedProperty()
	{
		$session = new Session;
		$namespace = $session->getNamespace('one');
		$this->assertFalse( isset($namespace->undefined) );
		$this->assertNull( $namespace->undefined, 'Getting value of non-existent key' );
		$this->assertSame( '', http_build_query($namespace->getIterator()) );
	}

}
