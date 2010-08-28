<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteWithAbsolutePathTest extends TestCase
{

	/**
	 * Nette\Application\Route with WithAbsolutePath
	 */
	public function testRouteWithWithAbsolutePath()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('/<abspath>/', array(
			'presenter' => 'Default',
			'action' => 'default',
		));

		testRouteIn($route, '/abc', 'Default', array(
			'abspath' => 'abc',
			'action' => 'default',
			'test' => 'testvalue',
		), '/abc/?test=testvalue');
	}

}
