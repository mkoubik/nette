<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteNoDefaultParamsTest extends TestCase
{

	/**
	 * Nette\Application\Route with NoDefaultParams
	 */
	public function testRouteWithNoDefaultParams()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>/<action>/<extra>', array(
		));

		testRouteIn($route, '/presenter/action/12', 'Presenter', array(
			'action' => 'action',
			'extra' => '12',
			'test' => 'testvalue',
		), NULL);
	}

}
