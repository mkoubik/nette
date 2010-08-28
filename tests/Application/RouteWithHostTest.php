<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithHostTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithHost
	 */
	public function testRouteWithWithHost()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('//<host>.<domain>/<path>', array(
			'presenter' => 'Default',
			'action' => 'default',
		));

		testRouteIn($route, '/abc', 'Default', array(
			'host' => 'example',
			'domain' => 'com',
			'path' => 'abc',
			'action' => 'default',
			'test' => 'testvalue',
		), '/abc?test=testvalue');
	}

}
