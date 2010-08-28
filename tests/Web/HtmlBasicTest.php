<?php

/**
 * Nette Framework test
 */

use Nette\Web\Html;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class HtmlBasicTest extends TestCase
{

	/**
	 * Nette\Web\Html basic usage.
	 */
	public function testHtmlBasicUsage()
	{
		$el = Html::el('img')->src('image.gif')->alt('');
		$this->assertSame( '<img src="image.gif" alt="" />', (string) $el );
		$this->assertSame( '<img src="image.gif" alt="" />', $el->startTag() );
		$this->assertSame( '', $el->endTag() );


		$el = Html::el('img')->src('image.gif')->alt('')->setText(NULL)->setText('any content');
		$this->assertSame( '<img src="image.gif" alt="" />', (string) $el );
		$this->assertSame( '<img src="image.gif" alt="" />', $el->startTag() );
		$this->assertSame( '', $el->endTag() );


		Html::$xhtml = FALSE;
		$this->assertSame( '<img src="image.gif" alt="">', (string) $el );


		$el = Html::el('img')->setSrc('image.gif')->setAlt('alt1')->setAlt('alt2');
		$this->assertSame( '<img src="image.gif" alt="alt2">', (string) $el );
		$this->assertSame( 'image.gif', $el->getSrc() );
		$this->assertNull( $el->getTitle() );
		$this->assertSame( 'alt2', $el->getAlt() );

		$el->addAlt('alt3');
		$this->assertSame( '<img src="image.gif" alt="alt2 alt3">', (string) $el );


		$el->style = 'float:left';
		$el->class = 'three';
		$el->lang = '';
		$el->title = '0';
		$el->checked = TRUE;
		$el->selected = FALSE;
		$el->name = 'testname';
		$el->setName('span');
		$this->assertSame( '<span src="image.gif" alt="alt2 alt3" style="float:left" class="three" lang="" title="0" checked name="testname"></span>', (string) $el );

		// setText vs. setHtml
		$this->assertSame( '<p>Hello &amp;ndash; World</p>', (string) Html::el('p')->setText('Hello &ndash; World'), 'setText' );
		$this->assertSame( '<p>Hello &ndash; World</p>', (string) Html::el('p')->setHtml('Hello &ndash; World'), 'setHtml' );

		// getText vs. getHtml
		$el = Html::el('p')->setHtml('Hello &ndash; World');
		$el->create('a')->setText('link');
		$this->assertSame( '<p>Hello &ndash; World<a>link</a></p>', (string) $el, 'getHtml' );
		$this->assertSame( 'Hello – Worldlink', $el->getText(), 'getText' );

		// email obfuscate
		$this->assertSame( '<a href="mailto:dave&#64;example.com"></a>', (string) Html::el('a')->href('mailto:dave@example.com'), 'mailto' );

		// href with query
		$this->assertSame( '<a href="file.php?a=10"></a>', (string) Html::el('a')->href('file.php', array('a' => 10)), 'href' );
	}

}
