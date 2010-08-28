<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteModulesTest extends TestCase
{

	/**
	 * Nette\Application\Route with Modules
	 */
	public function testRouteWithModules()
	{
		require __DIR__ . '/Route.inc';



		$route = new Route('<presenter>', array(
			'module' => 'module:submodule',
		));

		testRouteIn($route, '/abc', 'module:submodule:Abc', array(
			'test' => 'testvalue',
		), '/abc?test=testvalue');

		testRouteIn($route, '/');
		$this->assertNull( testRouteOut($route, 'Homepage') );
		$this->assertNull( testRouteOut($route, 'Module:Homepage') );
		$this->assertSame( 'http://example.com/homepage', testRouteOut($route, 'Module:Submodule:Homepage') );



		$route = new Route('<presenter>', array(
			'module' => 'Module:Submodule',
			'presenter' => 'Default',
		));

		testRouteIn($route, '/', 'Module:Submodule:Default', array(
			'test' => 'testvalue',
		), '/?test=testvalue');

		$this->assertNull( testRouteOut($route, 'Homepage') );
		$this->assertNull( testRouteOut($route, 'Module:Homepage') );
		$this->assertSame( 'http://example.com/homepage', testRouteOut($route, 'Module:Submodule:Homepage') );



		$route = new Route('<module>/<presenter>', array(
			'presenter' => 'AnyDefault',
		));

		testRouteIn($route, '/module.submodule', 'Module:Submodule:AnyDefault', array(
			'test' => 'testvalue',
		), '/module.submodule/?test=testvalue');

		$this->assertNull( testRouteOut($route, 'Homepage') );
		$this->assertSame( 'http://example.com/module/homepage', testRouteOut($route, 'Module:Homepage') );
		$this->assertSame( 'http://example.com/module.submodule/homepage', testRouteOut($route, 'Module:Submodule:Homepage') );




		$route = new Route('<module>/<presenter>', array(
			'module' => 'Module:Submodule',
			'presenter' => 'Default',
		));

		testRouteIn($route, '/module.submodule', 'Module:Submodule:Default', array(
			'test' => 'testvalue',
		), '/?test=testvalue');

		$this->assertNull( testRouteOut($route, 'Homepage') );
		$this->assertSame( 'http://example.com/module/homepage', testRouteOut($route, 'Module:Homepage') );
		$this->assertSame( 'http://example.com/module.submodule/homepage', testRouteOut($route, 'Module:Submodule:Homepage') );
	}

}
