<?php

/**
 * Nette Framework test
 */

use Nette\SafeStream;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class SafeStreamBasicTest extends TestCase
{

	/**
	 * Nette\SafeStream basic usage.
	 */
	public function testNetteSafeStreamBasicUsage()
	{
		SafeStream::register();


		// actually it creates temporary file
		$handle = fopen('safe://myfile.txt', 'x');
		fwrite($handle, 'atomic and safe');
		// and now rename it
		fclose($handle);

		// removes file thread-safe way
		unlink('safe://myfile.txt');

		// this is not thread safe - don't relay on returned value
		$ok = is_file('safe://SafeStream.php');
	}

}
