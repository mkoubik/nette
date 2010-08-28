<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;



class TestClass extends ComponentContainer
{

	public function createComponent($name)
	{
		return new self($this, $name);
	}

}



/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactory03Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component factory 3.
	 */
	public function testNetteComponentContainerComponentFactory3()
	{
		$a = new TestClass;
		$this->assertSame( 'b', $a->getComponent('b')->name );
	}

}
