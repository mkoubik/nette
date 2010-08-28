<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactoryAndRemove01Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component named factory.
	 */
	public function testNetteComponentContainerComponentNamedFactory()
	{
		class TestClass extends ComponentContainer
		{

			public function createComponentB()
			{
				return new self();
			}

		}


		$a = new TestClass;
		$b = $a->getComponent('b');

		$this->assertSame( 1, count($a->getComponents()) );


		$a->removeComponent($b);

		$this->assertSame( 0, count($a->getComponents()) );
	}

}
