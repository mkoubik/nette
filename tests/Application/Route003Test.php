<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class Route003Test extends TestCase
{

	/**
	 * Nette\Application\Route first optional parameter.
	 */
	public function testRouteFirstOptionalParameter()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>/<action>/<id \d{1,3}>', array(
			'presenter' => 'Default',
			'id' => NULL,
		));

		testRouteIn($route, '/presenter/action/12/any');

		testRouteIn($route, '/presenter/action/12/', 'Presenter', array(
			'action' => 'action',
			'id' => '12',
			'test' => 'testvalue',
		), '/presenter/action/12?test=testvalue');

		testRouteIn($route, '/presenter/action/12', 'Presenter', array(
			'action' => 'action',
			'id' => '12',
			'test' => 'testvalue',
		), '/presenter/action/12?test=testvalue');

		testRouteIn($route, '/presenter/action/1234');

		testRouteIn($route, '/presenter/action/', 'Presenter', array(
			'action' => 'action',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/action/?test=testvalue');

		testRouteIn($route, '/presenter/action', 'Presenter', array(
			'action' => 'action',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/action/?test=testvalue');

		testRouteIn($route, '/presenter/', 'Default', array(
			'action' => 'presenter',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/?test=testvalue');

		testRouteIn($route, '/presenter', 'Default', array(
			'action' => 'presenter',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/?test=testvalue');

		testRouteIn($route, '/');
	}

}
