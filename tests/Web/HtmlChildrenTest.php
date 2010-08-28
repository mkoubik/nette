<?php

/**
 * Nette Framework test
 */

use Nette\Web\Html;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class HtmlChildrenTest extends TestCase
{

	/**
	 * Nette\Web\Html basic usage.
	 */
	public function testHtmlBasicUsage()
	{
		// add
		$el = Html::el('ul');
		$el->create('li')->setText('one');
		$el->add( Html::el('li')->setText('two') )->class('hello');
		$this->assertSame( '<ul class="hello"><li>one</li><li>two</li></ul>', (string) $el );


		// with indentation
		$this->assertMatch( '
				<ul class="hello">
					<li>one</li>

					<li>two</li>
				</ul>
		', $el->render(2), 'indentation' );



		$el = Html::el(NULL);
		$el->add( Html::el('p')->setText('one') );
		$el->add( Html::el('p')->setText('two') );
		$this->assertSame( '<p>one</p><p>two</p>', (string) $el );


		// ==> Get child:
		$this->assertTrue( isset($el[1]), 'Child1' );
		$this->assertSame( '<p>two</p>', (string) $el[1] );
		$this->assertFalse( isset($el[2]), 'Child2' );



		// ==> Iterator:
		$el = Html::el('select');
		$el->create('optgroup')->label('Main')->create('option')->setText('sub one')->create('option')->setText('sub two');
		$el->create('option')->setText('Item');
		$this->assertSame( '<select><optgroup label="Main"><option>sub one<option>sub two</option></option></optgroup><option>Item</option></select>', (string) $el );
		$this->assertSame( 2, count($el) );
		$this->assertSame( "optgroup", $el[0]->getName() );
		$this->assertSame( "option", $el[1]->getName() );


		// ==> Deep iterator:
		foreach ($el->getIterator(TRUE) as $name => $child) {
			$tmp[] = $child instanceof Html ? $child->getName() : "'$child'";
		}
		$this->assertSame( array(
			"optgroup",
			"option",
			"'sub one'",
			"option",
			"'sub two'",
			"option",
			"'Item'",
		), $tmp );
	}

}
