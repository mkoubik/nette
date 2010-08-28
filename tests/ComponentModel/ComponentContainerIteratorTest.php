<?php

/**
 * Nette Framework test
 */

use Nette\Component,
	Nette\ComponentContainer,
	Nette\Forms\Button;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerIteratorTest extends TestCase
{

	/**
	 * Nette\ComponentContainer iterator.
	 */
	public function testNetteComponentContainerIterator()
	{
		class ComponentX extends Component
		{
		}

		$c = new ComponentContainer(NULL, 'top');

		$c->addComponent(new ComponentContainer, 'one');
		$c->addComponent(new ComponentX, 'two');
		$c->addComponent(new Button('label'), 'button1');

		$c->getComponent('one')->addComponent(new ComponentX, 'inner');
		$c->getComponent('one')->addComponent(new ComponentContainer, 'inner2');
		$c->getComponent('one')->getComponent('inner2')->addComponent(new Button('label'), 'button2');



		// Normal
		$list = $c->getComponents();
		$this->assertSame( array(
			"one",
			"two",
			"button1",
		), array_keys(iterator_to_array($list)) );



		// Filter
		$list = $c->getComponents(FALSE, 'Nette\Forms\Button');
		$this->assertSame( array(
			"button1",
		), array_keys(iterator_to_array($list)) );



		// RecursiveIteratorIterator
		$list = new RecursiveIteratorIterator($c->getComponents(), 1);
		$this->assertSame( array(
			"one",
			"inner",
			"inner2",
			"button2",
			"two",
			"button1",
		), array_keys(iterator_to_array($list)) );



		// Recursive
		$list = $c->getComponents(TRUE);
		$this->assertSame( array(
			"one",
			"inner",
			"inner2",
			"button2",
			"two",
			"button1",
		), array_keys(iterator_to_array($list)) );



		// Recursive CHILD_FIRST
		$list = $c->getComponents(-1);
		$this->assertSame( array(
			"inner",
			"button2",
			"inner2",
			"one",
			"two",
			"button1",
		), array_keys(iterator_to_array($list)) );



		// Recursive & filter I
		$list = $c->getComponents(TRUE, 'Nette\Forms\Button');
		$this->assertSame( array(
			"button2",
			"button1",
		), array_keys(iterator_to_array($list)) );



		// Recursive & filter II
		$list = $c->getComponents(TRUE, 'Nette\ComponentContainer');
		$this->assertSame( array(
			"one",
			"inner2",
		), array_keys(iterator_to_array($list)) );
	}

}
