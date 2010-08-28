<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteDashInParameterTest extends TestCase
{

	/**
	 * Nette\Application\Route with DashInParameter
	 */
	public function testRouteWithDashInParameter()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<para-meter>', array(
			'presenter' => 'Presenter',
		));

		testRouteIn($route, '/any', 'Presenter', array(
			'para-meter' => 'any',
			'test' => 'testvalue',
		), '/any?test=testvalue');
	}

}
