<?php

/**
 * Nette Framework test
 */

use Nette\Application\CliRouter,
	Nette\Web\HttpRequest;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class CliRouterInvalidTest extends TestCase
{

	/**
	 * Nette\Application\CliRouter invalid argument
	 */
	public function testCliRouterInvalidArgument()
	{
		$_SERVER['argv'] = 1;
		$httpRequest = new HttpRequest;

		$router = new CliRouter;
		$this->assertNull( $router->match($httpRequest) );
	}

}
