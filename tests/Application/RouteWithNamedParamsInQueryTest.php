<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithNamedParamsInQueryTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithNamedParamsInQuery
	 */
	public function testRouteWithWithNamedParamsInQuery()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('?action=<presenter> & act=<action [a-z]+>', array(
			'presenter' => 'Default',
			'action' => 'default',
		));

		testRouteIn($route, '/?act=action', 'Default', array(
			'action' => 'action',
			'test' => 'testvalue',
		), '/?act=action&test=testvalue');

		testRouteIn($route, '/?act=default', 'Default', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/?test=testvalue');
	}

}
