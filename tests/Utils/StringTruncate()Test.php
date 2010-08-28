<?php

/**
 * Nette Framework test
 */

use Nette\String;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class StringTruncateTest extends TestCase
{

	/**
	 * Nette\String::truncate()	 
	 */
	public function testNetteStringTruncate()
	{
		iconv_set_encoding('internal_encoding', 'UTF-8');
		$s = "\xc5\x98ekn\xc4\x9bte, jak se (dnes) m\xc3\xa1te?"; // Řekněte, jak se (dnes) máte?

		$this->assertSame( '…', String::truncate($s, -1), 'length=-1' );
		$this->assertSame( '…', String::truncate($s, 0), 'length=0' );
		$this->assertSame( '…', String::truncate($s, 1), 'length=1' );
		$this->assertSame( 'Ř…', String::truncate($s, 2), 'length=2' );
		$this->assertSame( 'Ře…', String::truncate($s, 3), 'length=3' );
		$this->assertSame( 'Řek…', String::truncate($s, 4), 'length=4' );
		$this->assertSame( 'Řekn…', String::truncate($s, 5), 'length=5' );
		$this->assertSame( 'Řekně…', String::truncate($s, 6), 'length=6' );
		$this->assertSame( 'Řeknět…', String::truncate($s, 7), 'length=7' );
		$this->assertSame( 'Řekněte…', String::truncate($s, 8), 'length=8' );
		$this->assertSame( 'Řekněte,…', String::truncate($s, 9), 'length=9' );
		$this->assertSame( 'Řekněte,…', String::truncate($s, 10), 'length=10' );
		$this->assertSame( 'Řekněte,…', String::truncate($s, 11), 'length=11' );
		$this->assertSame( 'Řekněte,…', String::truncate($s, 12), 'length=12' );
		$this->assertSame( 'Řekněte, jak…', String::truncate($s, 13), 'length=13' );
		$this->assertSame( 'Řekněte, jak…', String::truncate($s, 14), 'length=14' );
		$this->assertSame( 'Řekněte, jak…', String::truncate($s, 15), 'length=15' );
		$this->assertSame( 'Řekněte, jak se…', String::truncate($s, 16), 'length=16' );
		$this->assertSame( 'Řekněte, jak se …', String::truncate($s, 17), 'length=17' );
		$this->assertSame( 'Řekněte, jak se …', String::truncate($s, 18), 'length=18' );
		$this->assertSame( 'Řekněte, jak se …', String::truncate($s, 19), 'length=19' );
		$this->assertSame( 'Řekněte, jak se …', String::truncate($s, 20), 'length=20' );
		$this->assertSame( 'Řekněte, jak se …', String::truncate($s, 21), 'length=21' );
		$this->assertSame( 'Řekněte, jak se (dnes…', String::truncate($s, 22), 'length=22' );
		$this->assertSame( 'Řekněte, jak se (dnes)…', String::truncate($s, 23), 'length=23' );
		$this->assertSame( 'Řekněte, jak se (dnes)…', String::truncate($s, 24), 'length=24' );
		$this->assertSame( 'Řekněte, jak se (dnes)…', String::truncate($s, 25), 'length=25' );
		$this->assertSame( 'Řekněte, jak se (dnes)…', String::truncate($s, 26), 'length=26' );
		$this->assertSame( 'Řekněte, jak se (dnes)…', String::truncate($s, 27), 'length=27' );
		$this->assertSame( 'Řekněte, jak se (dnes) máte?', String::truncate($s, 28), 'length=28' );
		$this->assertSame( 'Řekněte, jak se (dnes) máte?', String::truncate($s, 29), 'length=29' );
		$this->assertSame( 'Řekněte, jak se (dnes) máte?', String::truncate($s, 30), 'length=30' );
		$this->assertSame( 'Řekněte, jak se (dnes) máte?', String::truncate($s, 31), 'length=31' );
		$this->assertSame( 'Řekněte, jak se (dnes) máte?', String::truncate($s, 32), 'length=32' );
	}

}
