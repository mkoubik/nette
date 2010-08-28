<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithUserClassAltTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithUserClassAlt
	 */
	public function testRouteWithWithUserClassAlt()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>/<id>', array(
			'id' => array(
				Route::PATTERN => '\d{1,3}',
			),
		));

		testRouteIn($route, '/presenter/12/', 'Presenter', array(
			'id' => '12',
			'test' => 'testvalue',
		), '/presenter/12?test=testvalue');

		testRouteIn($route, '/presenter/1234');

		testRouteIn($route, '/presenter/');
	}

}
