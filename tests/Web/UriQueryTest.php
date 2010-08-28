<?php

/**
 * Nette Framework test
 */

use Nette\Web\Uri;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class UriQueryTest extends TestCase
{

	/**
	 * Nette\Web\Uri query manipulation.
	 */
	public function testUriQueryManipulation()
	{
		$uri = new Uri('http://hostname/path?arg=value');
		$this->assertSame( 'arg=value',  $uri->query );

		$uri->appendQuery(NULL);
		$this->assertSame( 'arg=value',  $uri->query );

		$uri->appendQuery(array(NULL));
		$this->assertSame( 'arg=value',  $uri->query );

		$uri->appendQuery('arg2=value2');
		$this->assertSame( 'arg=value&arg2=value2',  $uri->query );

		$uri->appendQuery(array('arg3' => 'value3'));
		$this->assertSame( 'arg=value&arg2=value2&arg3=value3',  $uri->query );

		$uri->setQuery(array('arg3' => 'value3'));
		$this->assertSame( 'arg3=value3',  $uri->query );
	}

}
