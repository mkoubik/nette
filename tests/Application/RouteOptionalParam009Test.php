<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOptionalParam009Test extends TestCase
{

	/**
	 * Nette\Application\Route with 'required' optional sequence.
	 */
	public function testRouteWithRequiredOptionalSequence()
	{
		require __DIR__ . '/Route.inc';


		$route = new Route('index[!.html]', array(
		));

		testRouteIn($route, '/index.html', 'querypresenter', array(
			'test' => 'testvalue',
		), '/index.html?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/index', 'querypresenter', array(
			'test' => 'testvalue',
		), '/index.html?test=testvalue&presenter=querypresenter');
	}

}
