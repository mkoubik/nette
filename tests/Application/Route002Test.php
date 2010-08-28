<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class Route002Test extends TestCase
{

	/**
	 * Nette\Application\Route default usage.
	 */
	public function testRouteDefaultUsage()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('index.php', array(
			'action' => 'default',
		));

		testRouteIn($route, '/index.php', 'querypresenter', array(
			'action' => 'default',
			'test' => 'testvalue',
		), '/index.php?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/');
	}

}
