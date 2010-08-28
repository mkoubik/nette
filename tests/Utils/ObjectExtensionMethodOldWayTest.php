<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectExtensionMethodOldWayTest extends TestCase
{

	/**
	 * Nette\Object extension method old way.
	 */
	public function testNetteObjectExtensionMethodOldWay()
	{
		require __DIR__ . '/Object.inc';



		if (NETTE_PACKAGE === '5.3') {
			$this->skip('Requires Nette Framework package < PHP 5.3');
		}



		function TestClass_prototype_join(TestClass $that, $separator)
		{
			return $that->foo . $separator . $that->bar;
		}

		$obj = new TestClass('Hello', 'World');
		$this->assertSame( 'Hello*World', $obj->join('*') );
	}

}
