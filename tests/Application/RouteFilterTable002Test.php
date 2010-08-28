<?php

/**
 * Nette Framework test
 */

use Nette\Application\Route;




/**
 * @package    Nette\Application
 * @subpackage UnitTests
 */
class RouteFilterTable002Test extends TestCase
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

		$route = new Route(' ? action=<presenter #xlat>', array());

		testRouteIn($route, '/?action=kategorie', 'Category', array(
			'test' => 'testvalue',
		), '/?test=testvalue&action=kategorie');
	}

}
