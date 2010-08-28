<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithUserClassTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithUserClass
	 */
	public function testRouteWithWithUserClass()
	{
		require __DIR__ . '/Route.inc';



		Route::addStyle('#numeric');
		Route::setStyleProperty('#numeric', Route::PATTERN, '\d{1,3}');

		$route = new Route('<presenter>/<id #numeric>', array());

		testRouteIn($route, '/presenter/12/', 'Presenter', array(
			'id' => '12',
			'test' => 'testvalue',
		), '/presenter/12?test=testvalue');

		testRouteIn($route, '/presenter/1234');

		testRouteIn($route, '/presenter/');
	}

}
