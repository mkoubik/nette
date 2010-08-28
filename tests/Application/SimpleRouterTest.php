<?php

/**
 * Nette Framework test
 */

use Nette\Application\SimpleRouter;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class SimpleRouterTest extends TestCase
{

	/**
	 * Nette\Application\SimpleRouter basic functions.
	 */
	public function testSimpleRouterBasicFunctions()
	{
		require __DIR__ . '/SimpleRouter.inc';



		$router = new SimpleRouter(array(
			'id' => 12,
			'any' => 'anyvalue',
		));

		$httpRequest = new MockHttpRequest;
		$httpRequest->setQuery(array(
			'presenter' => 'myPresenter',
			'action' => 'action',
			'id' => '12',
			'test' => 'testvalue',
		));

		$req = $router->match($httpRequest);
		$this->assertSame( 'myPresenter',  $req->getPresenterName() );
		$this->assertSame( 'action',  $req->params['action'] );
		$this->assertSame( '12',  $req->params['id'] );
		$this->assertSame( 'testvalue',  $req->params['test'] );
		$this->assertSame( 'anyvalue',  $req->params['any'] );

		$url = $router->constructUrl($req, $httpRequest);
		$this->assertSame( 'http://nette.org/file.php?action=action&test=testvalue&presenter=myPresenter',  $url );
	}

}
