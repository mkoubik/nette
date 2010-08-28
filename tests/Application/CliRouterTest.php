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
class CliRouterTest extends TestCase
{

	/**
	 * Nette\Application\CliRouter basic usage
	 */
	public function testCliRouterBasicUsage()
	{
		// php.exe app.phpc homepage:default name --verbose -user "john doe" "-pass=se cret" /wait
		$_SERVER['argv'] = array(
			'app.phpc',
			'homepage:default',
			'name',
			'--verbose',
			'-user',
			'john doe',
			'-pass=se cret',
			'/wait',
		);

		$httpRequest = new HttpRequest;

		$router = new CliRouter(array(
			'id' => 12,
			'user' => 'anyvalue',
		));
		$req = $router->match($httpRequest);

		$this->assertSame( 'homepage', $req->getPresenterName() );

		$this->assertSame( array(
			'id' => 12,
			'user' => 'john doe',
			'action' => 'default',
			0 => 'name',
			'verbose' => TRUE,
			'pass' => 'se cret',
			'wait' => TRUE,
		), $req->params );

		$this->assertTrue( $req->isMethod('cli') );


		$this->assertNull( $router->constructUrl($req, $httpRequest) );
	}

}
