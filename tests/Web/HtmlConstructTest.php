<?php

/**
 * Nette Framework test
 */

use Nette\Web\Html;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class HtmlConstructTest extends TestCase
{

	/**
	 * Nette\Web\Html::__construct()
	 */
	public function testHtmlConstruct()
	{
		$this->assertSame( '<a lang="cs" href="#" title="" selected="selected">click</a>', (string) Html::el('a lang=cs href="#" title="" selected')->setText('click') );
		$this->assertSame( '<a lang="hello" world="world" href="hello world" title="hello \'world">click</a>', (string) Html::el('a lang=hello world href="hello world" title="hello \'world"')->setText('click') );
		$this->assertSame( '<a lang="hello&quot; world" href="hello " world="world" title="0">click</a>', (string) Html::el('a lang=\'hello" world\' href="hello "world" title=0')->setText('click') );
	}

}
