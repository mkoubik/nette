<?php

/**
 * Nette Framework test
 */

use Nette\ArrayList;




class Person
{
	private $name;


	public function __construct($name)
	{
		$this->name = $name;
	}



	public function sayHi()
	{
		return "My name is $this->name";
	}



	public function __toString()
	{
		return $this->name;
	}
}



/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ArrayList001Test extends TestCase
{

	/**
	 * Nette\ArrayList basic usage.
	 */
	public function testNetteArrayListBasicUsage()
	{
		$list = new ArrayList;
		$jack = new Person('Jack');
		$mary = new Person('Mary');



		// Adding Mary
		$list[] = $mary;

		// Adding Jack
		$list[] = $jack;



		$this->assertSame( 2, $list->count(), 'count:' );

		$this->assertSame( 2, count($list) );



		$this->assertEqual( array(
			new Person('Mary'),
			new Person('Jack'),
		), iterator_to_array($list) );




		// Get Interator:
		foreach ($list as $key => $person) {
			$tmp[] = $key . ' => ' . $person->sayHi();
		}
		$this->assertSame( array(
			'0 => My name is Mary',
			'1 => My name is Jack',
		), $tmp );




		try {
			// unset -1
			unset($list[-1]);
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('OutOfRangeException', 'Offset invalid or out of range', $e );
		}

		unset($list[1]);
		$this->assertEqual( array(
			new Person('Mary'),
		), iterator_to_array($list) );
	}

}
