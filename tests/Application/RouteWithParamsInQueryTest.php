<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithParamsInQueryTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithParamsInQuery
	 */
	public function testRouteWithWithParamsInQuery()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<action> ? <presenter>', array(
			'presenter' => 'Default',
			'action' => 'default',
		));

		testRouteIn($route, '/action/', 'querypresenter', array(
			'action' => 'action',
			'test' => 'testvalue',
		), '/action?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/', 'querypresenter', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/?test=testvalue&presenter=querypresenter');
	}

}
