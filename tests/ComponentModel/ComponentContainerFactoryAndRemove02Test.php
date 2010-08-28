<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactoryAndRemove02Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component factory & remove inside.
	 */
	public function testNetteComponentContainerComponentFactoryRemoveInside()
	{
		class TestClass extends ComponentContainer
		{

			public function createComponentB($name)
			{
				$b = new self($this, $name);
				$this->removeComponent($b);
				return new self;
			}

		}


		$a = new TestClass;
		$this->assertSame( 'b', $a->getComponent('b')->name );
	}

}
