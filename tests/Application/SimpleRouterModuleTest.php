<?php

/**
 * Nette Framework test
 */

use Nette\Application\SimpleRouter;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class SimpleRouterModuleTest extends TestCase
{

	/**
	 * Nette\Application\SimpleRouter and modules.
	 */
	public function testSimpleRouterAndModules()
	{
		require __DIR__ . '/SimpleRouter.inc';



		$router = new SimpleRouter(array(
			'module' => 'main:sub',
		));

		$httpRequest = new MockHttpRequest;
		$httpRequest->setQuery(array(
			'presenter' => 'myPresenter',
		));

		$req = $router->match($httpRequest);
		$this->assertSame( 'main:sub:myPresenter',  $req->getPresenterName() );

		$url = $router->constructUrl($req, $httpRequest);
		$this->assertSame( 'http://nette.org/file.php?presenter=myPresenter',  $url );

		$req = new Nette\Application\PresenterRequest(
			'othermodule:presenter',
			Nette\Web\HttpRequest::GET,
			array()
		);
		$url = $router->constructUrl($req, $httpRequest);
		$this->assertNull( $url );
	}

}
