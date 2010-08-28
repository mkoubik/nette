<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOptionalParam002Test extends TestCase
{

	/**
	 * Nette\Application\Route with optional sequence.
	 */
	public function testRouteWithOptionalSequence()
	{
		require __DIR__ . '/Route.inc';


		$route = new Route('index[.html]', array(
		));

		testRouteIn($route, '/index.html', 'querypresenter', array(
			'test' => 'testvalue',
		), '/index?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/index', 'querypresenter', array(
			'test' => 'testvalue',
		), '/index?test=testvalue&presenter=querypresenter');
	}

}
