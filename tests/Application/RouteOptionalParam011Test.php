<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOptionalParam011Test extends TestCase
{

	/**
	 * Nette\Application\Route with optional sequence precedence.
	 */
	public function testRouteWithOptionalSequencePrecedence()
	{
		require __DIR__ . '/Route.inc';


		$route = new Route('[<one>/][<two>]', array(
		));

		testRouteIn($route, '/one', 'querypresenter', array(
			'one' => 'one',
			'two' => NULL,
			'test' => 'testvalue',
		), '/one/?test=testvalue&presenter=querypresenter');

		$route = new Route('[<one>/]<two>', array(
			'two' => NULL,
		));

		testRouteIn($route, '/one', 'querypresenter', array(
			'one' => 'one',
			'two' => NULL,
			'test' => 'testvalue',
		), '/one/?test=testvalue&presenter=querypresenter');
	}

}
