<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerFactory06Test extends TestCase
{

	/**
	 * Nette\ComponentContainer component named factory 6.
	 */
	public function testNetteComponentContainerComponentNamedFactory6()
	{
		class TestClass extends ComponentContainer
		{

			public function createComponentB($name)
			{
				new self($this, $name);
			}

		}


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
