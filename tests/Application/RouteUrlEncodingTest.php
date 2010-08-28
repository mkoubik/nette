<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteUrlEncodingTest extends TestCase
{

	/**
	 * Nette\Application\Route with UrlEncoding
	 */
	public function testRouteWithUrlEncoding()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<param>', array(
			'presenter' => 'Presenter',
		));

		testRouteIn($route, '/a%3Ab', 'Presenter', array(
			'param' => 'a:b',
			'test' => 'testvalue',
		), '/a%3Ab?test=testvalue');
	}

}
