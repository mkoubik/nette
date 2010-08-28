<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOptionalParam003Test extends TestCase
{

	/**
	 * Nette\Application\Route with optional sequence and two parameters.
	 */
	public function testRouteWithOptionalSequenceAndTwoParameters()
	{
		require __DIR__ . '/Route.inc';


		$route = new Route('[<one [a-z]+><two [0-9]+>]', array(
			'one' => 'a',
			'two' => '1',
		));

		testRouteIn($route, '/a1', 'querypresenter', array(
			'one' => 'a',
			'two' => '1',
			'test' => 'testvalue',
		), '/?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/x1', 'querypresenter', array(
			'one' => 'x',
			'two' => '1',
			'test' => 'testvalue',
		), '/x1?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/a2', 'querypresenter', array(
			'one' => 'a',
			'two' => '2',
			'test' => 'testvalue',
		), '/a2?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/x2', 'querypresenter', array(
			'one' => 'x',
			'two' => '2',
			'test' => 'testvalue',
		), '/x2?test=testvalue&presenter=querypresenter');
	}

}
