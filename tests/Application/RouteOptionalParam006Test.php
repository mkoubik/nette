<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteOptionalParam006Test extends TestCase
{

	/**
	 * Nette\Application\Route with 'required' optional sequences I.
	 */
	public function testRouteWithRequiredOptionalSequencesI()
	{
		require __DIR__ . '/Route.inc';


		$route = new Route('[!<lang [a-z]{2}>[-<sub>]/]<name>[/page-<page>]', array(
			'sub' => 'cz',
		));

		testRouteIn($route, '/cs-cz/name', 'querypresenter', array(
			'lang' => 'cs',
			'sub' => 'cz',
			'name' => 'name',
			'page' => NULL,
			'test' => 'testvalue',
		), '/cs/name?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/cs-xx/name', 'querypresenter', array(
			'lang' => 'cs',
			'sub' => 'xx',
			'name' => 'name',
			'page' => NULL,
			'test' => 'testvalue',
		), '/cs-xx/name?test=testvalue&presenter=querypresenter');

		testRouteIn($route, '/name', 'querypresenter', array(
			'name' => 'name',
			'sub' => 'cz',
			'page' => NULL,
			'lang' => NULL,
			'test' => 'testvalue',
		), NULL);
	}

}
