<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOptionalParam010Test extends TestCase
{

	/**
	 * Nette\Application\Route with module in optional sequence.
	 */
	public function testRouteWithModuleInOptionalSequence()
	{
		require __DIR__ . '/Route.inc';


		$route = new Route('[<module admin|image>/]<presenter>/<action>', array(
			'module' => 'Front',
			'presenter' => 'Homepage',
			'action' => 'default',
		));

		testRouteIn($route, '/one', 'Front:One', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/one/?test=testvalue');

		testRouteIn($route, '/admin/one', 'Admin:One', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/admin/one/?test=testvalue');

		testRouteIn($route, '/one/admin', 'Front:One', array(
			'action' => 'admin',
			'test' => 'testvalue',
		), '/one/admin?test=testvalue');
	}

}
