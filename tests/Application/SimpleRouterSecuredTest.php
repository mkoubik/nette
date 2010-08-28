<?php

/**
 * Nette Framework test
 */

use Nette\Application\SimpleRouter;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class SimpleRouterSecuredTest extends TestCase
{

	/**
	 * Nette\Application\SimpleRouter with secured connection.
	 */
	public function testSimpleRouterWithSecuredConnection()
	{
		require __DIR__ . '/SimpleRouter.inc';



		$router = new SimpleRouter(array(
			'id' => 12,
			'any' => 'anyvalue',
		), SimpleRouter::SECURED);

		$httpRequest = new MockHttpRequest;
		$httpRequest->setQuery(array(
			'presenter' => 'myPresenter',
		));

		$req = new Nette\Application\PresenterRequest(
			'othermodule:presenter',
			Nette\Web\HttpRequest::GET,
			array()
		);

		$url = $router->constructUrl($req, $httpRequest);
		$this->assertSame( 'https://nette.org/file.php?presenter=othermodule%3Apresenter',  $url );
	}

}
