<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteCombinedUrlParamTest extends TestCase
{

	/**
	 * Nette\Application\Route with CombinedUrlParam
	 */
	public function testRouteWithCombinedUrlParam()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('extra<presenter>/<action>', array(
			'presenter' => 'Default',
			'action' => 'default',
		));


		testRouteIn($route, '/presenter/action/');

		testRouteIn($route, '/extrapresenter/action/', 'Presenter', array(
			'action' => 'action',
			'test' => 'testvalue',
		), '/extrapresenter/action?test=testvalue');

		testRouteIn($route, '/extradefault/default/', 'Default', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/extra?test=testvalue');

		testRouteIn($route, '/extra', 'Default', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/extra?test=testvalue');

		testRouteIn($route, '/');
	}

}
