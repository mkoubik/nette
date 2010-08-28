<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;



class TestClass extends ComponentContainer
{

	public function createComponent($name)
	{
		return new self;
	}

}


/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactory01Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component factory 1.
	 */
	public function testNetteComponentContainerComponentFactory1()
	{
		$a = new TestClass;
		$this->assertSame( 'b', $a->getComponent('b')->name );
	}

}
