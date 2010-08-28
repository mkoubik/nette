<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;



class TestClass extends ComponentContainer
{

	public function createComponent($name)
	{
		new self($this, $name);
	}

}



/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactory02Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component factory 2.
	 */
	public function testNetteComponentContainerComponentFactory2()
	{
		$a = new TestClass;
		$this->assertSame( 'b', $a->getComponent('b')->name );
	}

}
