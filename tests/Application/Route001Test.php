<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class Route001Test extends TestCase
{

	/**
	 * Nette\Application\Route default usage.
	 */
	public function testRouteDefaultUsage()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>/<action>/<id \d{1,3}>', array(
			'action' => 'default',
			'id' => NULL,
		));

		$this->assertSame( 'http://example.com/homepage/', testRouteOut($route, 'Homepage') );

		$this->assertSame( 'http://example.com/homepage/', testRouteOut($route, 'Homepage', array('action' => 'default')) );

		$this->assertNull( testRouteOut($route, 'Homepage', array('id' => 'word')) );

		$this->assertSame( 'http://example.com/front.homepage/', testRouteOut($route, 'Front:Homepage') );

		testRouteIn($route, '/presenter/action/12/any');

		testRouteIn($route, '/presenter/action/12/', 'Presenter', array(
			'action' => 'action',
			'id' => '12',
			'test' => 'testvalue',
		), '/presenter/action/12?test=testvalue');

		testRouteIn($route, '/presenter/action/12', 'Presenter', array(
			'action' => 'action',
			'id' => '12',
			'test' => 'testvalue',
		), '/presenter/action/12?test=testvalue');

		testRouteIn($route, '/presenter/action/1234');

		testRouteIn($route, '/presenter/action/', 'Presenter', array(
			'action' => 'action',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/action/?test=testvalue');

		testRouteIn($route, '/presenter/action', 'Presenter', array(
			'action' => 'action',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/action/?test=testvalue');

		testRouteIn($route, '/presenter/', 'Presenter', array(
			'action' => 'default',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/?test=testvalue');

		testRouteIn($route, '/presenter', 'Presenter', array(
			'action' => 'default',
			'id' => NULL,
			'test' => 'testvalue',
		), '/presenter/?test=testvalue');

		testRouteIn($route, '/');
	}

}
