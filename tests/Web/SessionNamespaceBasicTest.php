<?php

/**
 * Nette Framework test
 */

use Nette\Web\Session;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class SessionNamespaceBasicTest extends TestCase
{

	/**
	 * Nette\Web\SessionNamespace basic usage.
	 */
	public function testSessionNamespaceBasicUsage()
	{
		$session = new Session;
		$namespace = $session->getNamespace('one');
		$namespace->a = 'apple';
		$namespace->p = 'pear';
		$namespace['o'] = 'orange';

		foreach ($namespace as $key => $val) {
			$tmp[] = "$key=$val";
		}
		$this->assertSame( array(
			'a=apple',
			'p=pear',
			'o=orange',
		), $tmp );


		$this->assertTrue( isset($namespace['p']) );
		$this->assertTrue( isset($namespace->o) );
		$this->assertFalse( isset($namespace->undefined) );

		unset($namespace['a']);
		unset($namespace->p);
		unset($namespace->o);
		unset($namespace->undef);

		$this->assertSame( '', http_build_query($namespace->getIterator()) );
	}

}
