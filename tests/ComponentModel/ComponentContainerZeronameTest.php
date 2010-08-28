<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerZeronameTest extends TestCase
{

	/**
	 * Nette\ComponentContainer and '0' name.
	 */
	public function testNetteComponentContainerAnd0Name()
	{
		$container = new ComponentContainer;
		$container->addComponent(new ComponentContainer, 0);
		$this->assertSame( '0', $container->getComponent(0)->getName() );
	}

}
