<?php

/**
 * Nette Framework test
 */

use Nette\Web\Html;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class HtmlDataTest extends TestCase
{

	/**
	 * Nette\Web\Html user data attribute.
	 */
	public function testHtmlUserDataAttribute()
	{
		$el = Html::el('div');
		$el->data['a'] = 'one';
		$el->data['b'] = NULL;
		$el->data['c'] = FALSE;
		$el->data['d'] = '';
		$el->data['e'] = 'two';

		$this->assertSame( '<div data-a="one" data-d="" data-e="two"></div>', (string) $el );


		// direct
		$el = Html::el('div');
		$el->{'data-x'} = 'x';
		$el->data['x'] = 'y';

		$this->assertSame( '<div data-x="x" data-x="y"></div>', (string) $el );


		// function
		$el = Html::el('div');
		$el->data('a', 'one');
		$el->data('b', 'two');

		$this->assertSame( '<div data-a="one" data-b="two"></div>', (string) $el );


		$el = Html::el('div');
		$el->data('top', NULL);
		$el->data('active', FALSE);
		$el->data('x', '');
		$this->assertSame( '<div data-x=""></div>', (string) $el );


		$el = Html::el('div');
		$el->data = 'simple';
		$this->assertSame( '<div data="simple"></div>', (string) $el );
	}

}
