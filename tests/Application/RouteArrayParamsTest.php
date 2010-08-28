<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteArrayParamsTest extends TestCase
{

	/**
	 * Nette\Application\Route with ArrayParams
	 */
	public function testRouteWithArrayParams()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route(' ? arr=<arr>', array(
			'presenter' => 'Default',
			'arr' => '',
		));

		testRouteIn($route, '/?arr[1]=1&arr[2]=2', 'Default', array(
			'arr' => array(
				1 => '1',
				2 => '2',
			),
			'test' => 'testvalue',
		), '/?arr%5B1%5D=1&arr%5B2%5D=2&test=testvalue');
	}

}
