<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteCamelcapsVsDashTest extends TestCase
{

	/**
	 * Nette\Application\Route with CamelcapsVsDash
	 */
	public function testRouteWithCamelcapsVsDash()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>', array(
			'presenter' => 'DefaultPresenter',
		));

		testRouteIn($route, '/abc-x-y-z', 'AbcXYZ', array(
			'test' => 'testvalue',
		), '/abc-x-y-z?test=testvalue');

		testRouteIn($route, '/', 'DefaultPresenter', array(
			'test' => 'testvalue',
		), '/?test=testvalue');

		testRouteIn($route, '/--');
	}

}
