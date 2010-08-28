<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithDefaultPresenterAndActionTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithDefaultPresenterAndAction
	 */
	public function testRouteWithWithDefaultPresenterAndAction()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>/<action>', array(
			'presenter' => 'Default',
			'action' => 'default',
		));

		testRouteIn($route, '/presenter/action/', 'Presenter', array(
			'action' => 'action',
			'test' => 'testvalue',
		), '/presenter/action?test=testvalue');

		testRouteIn($route, '/default/default/', 'Default', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/?test=testvalue');

		testRouteIn($route, '/presenter', 'Presenter', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/presenter/?test=testvalue');

		testRouteIn($route, '/', 'Default', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/?test=testvalue');
	}

}
