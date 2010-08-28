<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteSecuredTest extends TestCase
{

	/**
	 * Nette\Application\Route with Secured
	 */
	public function testRouteWithSecured()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<param>', array(
			'presenter' => 'Presenter',
		), Route::SECURED);

		testRouteIn($route, '/any', 'Presenter', array(
			'param' => 'any',
			'test' => 'testvalue',
		), 'https://example.com/any?test=testvalue');
	}

}
