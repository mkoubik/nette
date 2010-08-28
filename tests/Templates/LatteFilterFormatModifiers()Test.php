<?php

/**
 * Nette Framework test
 */

use Nette\Templates\LatteFilter;




/**
 * @package    Nette\Templates
 * @subpackage UnitTests
 */
class LatteFilterFormatModifiersTest extends TestCase
{

	/**
	 * Nette\Templates\LatteFilter::formatModifiers()
	 */
	public function testLatteFilterFormatModifiers()
	{
		// special

		$this->assertSame( '@',  LatteFilter::formatModifiers('@', '') );
		$this->assertSame( '@',  LatteFilter::formatModifiers('@', ':') );
		$this->assertSame( '@',  LatteFilter::formatModifiers('@', '|') );
		$this->assertSame( '$template->mod(@)',  LatteFilter::formatModifiers('@', 'mod::||:|') );

		// common

		$this->assertSame( '$template->mod(@)',  LatteFilter::formatModifiers('@', 'mod') );
		$this->assertSame( '$template->mod3($template->mod2($template->mod1(@)))',  LatteFilter::formatModifiers('@', 'mod1|mod2|mod3') );

		// arguments

		$this->assertSame( '$template->mod(@, "arg1", 2, $var["pocet"])',  LatteFilter::formatModifiers('@', 'mod:arg1:2:$var["pocet"]') );
		$this->assertSame( '$template->mod(@, "arg1", 2, $var["pocet"])',  LatteFilter::formatModifiers('@', 'mod,arg1,2,$var["pocet"]') );
		$this->assertSame( '$template->mod(@, " :a:b:c", "", 3, "")',  LatteFilter::formatModifiers('@', 'mod:" :a:b:c":"":3:""') );
		$this->assertSame( '$template->mod(@, "\":a:b:c")',  LatteFilter::formatModifiers('@', 'mod:"\\":a:b:c"') );
		$this->assertSame( "\$template->mod(@, '\':a:b:c')",  LatteFilter::formatModifiers('@', "mod:'\\':a:b:c'") );
		$this->assertSame( '$template->mod(@, \'\\\\\', "a", "b", "c", "arg2")',  LatteFilter::formatModifiers('@', "mod:'\\\\':a:b:c':arg2") );
	}

}
