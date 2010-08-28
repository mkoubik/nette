<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;



class TestClass extends ComponentContainer
{

	public function createComponentB($name)
	{
		return new self;
	}

}



/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactory04Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component named factory 4.
	 */
	public function testNetteComponentContainerComponentNamedFactory4()
	{
		$a = new TestClass;
		$this->assertSame( 'b', $a->getComponent('b')->name );



		try {
			$a->getComponent('B')->name;
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', "Component with name 'B' does not exist.", $e );
		}
	}

}
