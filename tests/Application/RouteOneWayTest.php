<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOneWayTest extends TestCase
{

	/**
	 * Nette\Application\Route with OneWay
	 */
	public function testRouteWithOneWay()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>/<action>', array(
			'presenter' => 'Default',
			'action' => 'default',
		), Route::ONE_WAY);

		testRouteIn($route, '/presenter/action/', 'Presenter', array(
			'action' => 'action',
			'test' => 'testvalue',
		), NULL);
	}

}
