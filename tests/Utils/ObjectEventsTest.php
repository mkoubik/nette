<?php

/**
 * Nette Framework test
 */

use Nette\Object;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ObjectEventsTest extends TestCase
{

	/**
	 * Nette\Object event handlers.
	 */
	public function testNetteObjectEventHandlers()
	{
		require __DIR__ . '/Object.inc';



		function handler($obj)
		{
			$obj->counter++;
		}



		class Handler
		{
			function __invoke($obj)
			{
				$obj->counter++;
			}
		}



		$obj = new TestClass;
		$var = (object) NULL;

		$obj->onPublic[] = 'handler';

		$obj->onPublic($var);
		$this->assertSame( 1, $var->counter );



		$obj->onPublic[] = new Handler;

		$obj->onPublic($var);
		$this->assertSame( 3, $var->counter );



		try {
			$obj->onPrivate(123);
			$this->fail('called private event');

			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('MemberAccessException', 'Call to undefined method TestClass::onPrivate().', $e );
		}


		try {
			$obj->onUndefined(123);
			$this->fail('called undefined event');

			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('MemberAccessException', 'Call to undefined method TestClass::onUndefined().', $e );
		}
	}

}
