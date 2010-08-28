<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteFilterTable001Test extends TestCase
{

	/**
	 * Nette\Application\Route with FilterTable
	 */
	public function testRouteWithFilterTable()
	{
		require __DIR__ . '/Route.inc';



		Route::addStyle('#xlat', 'presenter');
		Route::setStyleProperty('#xlat', Route::FILTER_TABLE, array(
			'produkt' => 'Product',
			'kategorie' => 'Category',
			'zakaznik' => 'Customer',
			'kosik' => 'Basket',
		));

		$route = new Route('<presenter #xlat>', array());

		testRouteIn($route, '/kategorie/', 'Category', array(
			'test' => 'testvalue',
		), '/kategorie?test=testvalue');

		testRouteIn($route, '/other/', 'Other', array(
			'test' => 'testvalue',
		), '/other?test=testvalue');
	}

}
