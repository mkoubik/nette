<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteFooParameter002Test extends TestCase
{

	/**
	 * Nette\Application\Route with FooParameter
	 */
	public function testRouteWithFooParameter()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('index<?.xml>/', array(
			'presenter' => 'DefaultPresenter',
		));


		testRouteIn($route, '/index.');

		testRouteIn($route, '/index.xml', 'DefaultPresenter', array(
			'test' => 'testvalue',
		), '/index.xml/?test=testvalue');

		testRouteIn($route, '/index.php');

		testRouteIn($route, '/index', 'DefaultPresenter', array(
			'test' => 'testvalue',
		), '/index.xml/?test=testvalue');
	}

}
