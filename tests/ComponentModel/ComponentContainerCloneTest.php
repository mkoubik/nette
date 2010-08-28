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


/**/Nette\Object::extensionMethod('Nette\\IComponentContainer::export', function($thisObj)/**/
/*5.2* function IComponentContainer_prototype_export($thisObj)*/
{
	$res = array("({$thisObj->reflection->name})" => $thisObj->name);
	if ($thisObj instanceof Nette\IComponentContainer) {
		foreach ($thisObj->getComponents() as $name => $obj) {
			$res['children'][$name] = $obj->export();
		}
	}
	return $res;
}/**/);/**/


class A extends TestClass {}
class B extends TestClass {}
class C extends TestClass {}
class D extends TestClass {}
class E extends TestClass {}


/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ComponentContainerCloneTest extends TestCase
{

	/**
	 * Nette\ComponentContainer cloning.
	 */
	public function testNetteComponentContainerCloning()
	{
		$a = new A;
		$a['b'] = new B;
		$a['b']['c'] = new C;
		$a['b']['c']['d'] = new D;
		$a['b']['c']['d']['e'] = new E;

		$a['b']->monitor('a');
		$a['b']->monitor('a');
		$a['b']['c']->monitor('a');

		$this->assertSame( array(
			'B::ATTACHED(A)',
			'C::ATTACHED(A)',
		), $this->fetchNotes());

		$this->assertSame( 'b-c-d-e', $a['b']['c']['d']['e']->lookupPath('A', FALSE) );



		// ==> clone 'c'
		$dolly = clone $a['b']['c'];

		$this->assertSame( array(
			'C::detached(A)',
		), $this->fetchNotes());

		$this->assertNull( $dolly['d']['e']->lookupPath('A', FALSE) );

		$this->assertSame( 'd-e', $dolly['d']['e']->lookupPath('C', FALSE) );



		// ==> clone 'b'
		$dolly = clone $a['b'];

		$this->assertSame( array(
			'C::detached(A)',
			'B::detached(A)',
		), $this->fetchNotes());



		// ==> a['dolly'] = 'b'
		$a['dolly'] = $dolly;

		$this->assertSame( array(
			'C::ATTACHED(A)',
			'B::ATTACHED(A)',
		), $this->fetchNotes());

		$this->assertSame( array(
			'(A)' => NULL,
			'children' => array(
				'b' => array(
					'(B)' => 'b',
					'children' => array(
						'c' => array(
							'(C)' => 'c',
							'children' => array(
								'd' => array(
									'(D)' => 'd',
									'children' => array(
										'e' => array(
											'(E)' => 'e',
										),
									),
								),
							),
						),
					),
				),
				'dolly' => array(
					'(B)' => 'dolly',
					'children' => array(
						'c' => array(
							'(C)' => 'c',
							'children' => array(
								'd' => array(
									'(D)' => 'd',
									'children' => array(
										'e' => array(
											'(E)' => 'e',
										),
									),
								),
							),
						),
					),
				),
			),
		), $a->export() );
	}

}
