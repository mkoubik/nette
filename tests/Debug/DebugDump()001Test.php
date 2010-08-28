<?php

/**
 * Nette Framework test
 */

use Nette\Debug;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class DebugDump001Test extends TestCase
{

	/**
	 * Nette\Debug::dump() basic types in HTML and text mode.
	 */
	public function testNetteDebugDumpBasicTypesInHTMLAndTextMode()
	{
		Debug::$productionMode = FALSE;



		class Test
		{
			public $x = array(10, NULL);

			private $y = 'hello';

			protected $z = 30;
		}


		// HTML mode

		Debug::$consoleMode = FALSE;

		$this->assertMatch( '<pre class="nette-dump">NULL
		</pre>', Debug::dump(NULL, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">TRUE
		</pre>', Debug::dump(TRUE, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">FALSE
		</pre>', Debug::dump(FALSE, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">0
		</pre>', Debug::dump(0, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">1
		</pre>', Debug::dump(1, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">0.0
		</pre>', Debug::dump(0.0, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">0.1
		</pre>', Debug::dump(0.1, TRUE) );

		$this->assertMatch( '<pre class="nette-dump">""
		</pre>', Debug::dump('', TRUE) );

		$this->assertMatch( '<pre class="nette-dump">"0"
		</pre>', Debug::dump('0', TRUE) );

		$this->assertMatch( '<pre class="nette-dump">"\\x00"
		</pre>', Debug::dump("\x00", TRUE) );

		$this->assertMatch( '<pre class="nette-dump"><span>array</span>(5) <code>[
		   0 => 1
		   1 => "hello" (5)
		   2 => <span>array</span>(0)
		   3 => <span>array</span>(2) <code>[
		      0 => 1
		      1 => 2
		   ]</code>
		   4 => <span>array</span>(2) <code>{
		      1 => 1
		      2 => 2
		   }</code>
		]</code>
		</pre>
		', Debug::dump(array(1, 'hello', array(), array(1, 2), array(1 => 1, 2)), TRUE) );

		$this->assertMatch( '<pre class="nette-dump"><span>stream resource</span>
		</pre>', Debug::dump(fopen(__FILE__, 'r'), TRUE) );

		$this->assertMatch( '<pre class="nette-dump"><span>stdClass</span>(0)
		</pre>', Debug::dump((object) NULL, TRUE) );

		$obj = new Test;
		$this->assertSame(Debug::dump($obj), $obj);


		// Text mode

		Debug::$consoleMode = TRUE;

		$this->assertMatch( 'NULL', Debug::dump(NULL, TRUE) );

		$this->assertMatch( 'TRUE', Debug::dump(TRUE, TRUE) );

		$this->assertMatch( 'FALSE', Debug::dump(FALSE, TRUE) );

		$this->assertMatch( '0', Debug::dump(0, TRUE) );

		$this->assertMatch( '1', Debug::dump(1, TRUE) );

		$this->assertMatch( '0.0', Debug::dump(0.0, TRUE) );

		$this->assertMatch( '0.1', Debug::dump(0.1, TRUE) );

		$this->assertMatch( '""', Debug::dump('', TRUE) );

		$this->assertMatch( '"0"', Debug::dump('0', TRUE) );

		$this->assertMatch( '"\\x00"', Debug::dump("\x00", TRUE) );

		$this->assertMatch( 'array(5) [
		   0 => 1
		   1 => "hello" (5)
		   2 => array(0)
		   3 => array(2) [
		      0 => 1
		      1 => 2
		   ]
		   4 => array(2) {
		      1 => 1
		      2 => 2
		   }
		]
		', Debug::dump(array(1, 'hello', array(), array(1, 2), array(1 => 1, 2)), TRUE) );

		$this->assertMatch( 'stream resource', Debug::dump(fopen(__FILE__, 'r'), TRUE) );

		$this->assertMatch( 'stdClass(0)', Debug::dump((object) NULL, TRUE) );

		$this->assertMatch( 'Test(3) {
		   "x" => array(2) [
		      0 => 10
		      1 => NULL
		   ]
		   "y" private => "hello" (5)
		   "z" protected => 30
		}
		', Debug::dump($obj, TRUE) );
	}

}
