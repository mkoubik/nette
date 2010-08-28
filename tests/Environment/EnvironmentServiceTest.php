<?php

/**
 * Nette Framework test
 */

use Nette\Environment;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class EnvironmentServiceTest extends TestCase
{

	/**
	 * Nette\Environment services.
	 */
	public function testNetteEnvironmentServices()
	{
		$this->assertSame( 'Nette\Web\HttpResponse', Environment::getHttpResponse()->reflection->name );


		$this->assertSame( 'Nette\Application\Application', Environment::getApplication()->reflection->name );


		Environment::setVariable('tempDir', __DIR__ . '/tmp');
		$this->assertSame( 'Nette\Caching\Cache', Environment::getCache('my')->reflection->name );


		/* in PHP 5.3
		Environment::setServiceAlias('Nette\Web\IUser', 'xyz');
		$this->assertSame('xyz', Environment::getXyz()->reflection->name );
		*/
	}

}
