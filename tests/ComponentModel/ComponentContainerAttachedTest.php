<?php

/**
 * Nette Framework test
 */

use Nette\ComponentContainer;



class TestClass extends ComponentContainer implements ArrayAccess
{
	protected function attached($obj)
	{
		$this->note(get_class($this) . '::ATTACHED(' . get_class($obj) . ')');
	}

	protected function detached($obj)
	{
		$this->note(get_class($this) . '::detached(' . get_class($obj) . ')');
	}

	final public function offsetSet($name, $component)
	{
		$this->addComponent($component, $name);
	}

	final public function offsetGet($name)
	{
		return $this->getComponent($name, TRUE);
	}

	final public function offsetExists($name)
	{
		return $this->getComponent($name) !== NULL;
	}

	final public function offsetUnset($name)
	{
		$this->removeComponent($this->getComponent($name, TRUE));
	}
}


class A extends TestClass {}
class B extends TestClass {}
class C extends TestClass {}
class D extends TestClass {}
class E extends TestClass {}


/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerAttachedTest extends TestCase
{

	/**
	 * Nette\ComponentContainer::attached()
	 */
	public function testNetteComponentContainerAttached()
	{
		$d = new D;
		$d['e'] = new E;
		$b = new B;
		$b->monitor('a');
		$b['c'] = new C;
		$b['c']->monitor('a');
		$b['c']['d'] = $d;

		// 'a' becoming 'b' parent
		$a = new A;
		$a['b'] = $b;
		$this->assertSame( array(
			'C::ATTACHED(A)',
			'B::ATTACHED(A)',
		), $this->fetchNotes());



		// removing 'b' from 'a'
		unset($a['b']);
		$this->assertSame( array(
			'C::detached(A)',
			'B::detached(A)',
		), $this->fetchNotes());

		// 'a' becoming 'b' parent
		$a['b'] = $b;

		$this->assertSame( 'b-c-d-e', $d['e']->lookupPath('A') );

		$this->assertTrue( $a['b-c'] === $b['c'] );
	}

}
