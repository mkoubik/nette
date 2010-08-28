<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class Route004Test extends TestCase
{

	/**
	 * Nette\Application\Route UTF-8 parameter.
	 */
	public function testRouteUTF8Parameter()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<param č>', array(
			'presenter' => 'Default',
		));

		testRouteIn($route, '/č', 'Default', array(
			'param' => 'č',
			'test' => 'testvalue',
		), '/%C4%8D?test=testvalue');

		testRouteIn($route, '/%C4%8D', 'Default', array(
			'param' => 'č',
			'test' => 'testvalue',
		), '/%C4%8D?test=testvalue');

		testRouteIn($route, '/');
	}

}
