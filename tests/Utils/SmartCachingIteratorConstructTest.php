<?php

/**
 * Nette Framework test
 */

use Nette\SmartCachingIterator;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class SmartCachingIteratorConstructTest extends TestCase
{

	/**
	 * Nette\SmartCachingIterator constructor.
	 */
	public function testNetteSmartCachingIteratorConstructor()
	{
		// ==> array

		$arr = array('Nette', 'Framework');
		$tmp = array();
		foreach (new SmartCachingIterator($arr) as $k => $v) $tmp[] = "$k => $v";
		$this->assertSame( array(
			'0 => Nette',
			'1 => Framework',
		), $tmp );



		// ==> stdClass

		$arr = (object) array('Nette', 'Framework');
		$tmp = array();
		foreach (new SmartCachingIterator($arr) as $k => $v) $tmp[] = "$k => $v";
		$this->assertSame( array(
			'0 => Nette',
			'1 => Framework',
		), $tmp );



		// ==> IteratorAggregate

		$arr = new ArrayObject(array('Nette', 'Framework'));
		$tmp = array();
		foreach (new SmartCachingIterator($arr) as $k => $v) $tmp[] = "$k => $v";
		$this->assertSame( array(
			'0 => Nette',
			'1 => Framework',
		), $tmp );



		// ==> Iterator

		$tmp = array();
		foreach (new SmartCachingIterator($arr->getIterator()) as $k => $v) $tmp[] = "$k => $v";
		$this->assertSame( array(
			'0 => Nette',
			'1 => Framework',
		), $tmp );



		// ==> SimpleXMLElement

		$arr = new SimpleXMLElement('<feed><item>Nette</item><item>Framework</item></feed>');
		$tmp = array();
		foreach (new SmartCachingIterator($arr) as $k => $v) $tmp[] = "$k => $v";
		$this->assertSame( array(
			'item => Nette',
			'item => Framework',
		), $tmp );



		// ==> object

		try {
			$arr = dir('.');
			foreach (new SmartCachingIterator($arr) as $k => $v);
			$this->assertFail('Expected exception');
		} catch (Exception $e) {
			$this->assertException('InvalidArgumentException', NULL, $e );
		}
	}

}
