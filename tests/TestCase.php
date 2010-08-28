<?php

/**
 * Nette Framework test case.
 *
 * @author     David Grudl
 * @package    Nette\Test
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{

	/** @var array */
	private $notes = array();


	/**
	 * Checks exception assertation.
	 * @param  string class
	 * @param  string message
	 * @param  Exception
	 * @return void
	 */
	public function assertException($class, $message, $actual)
	{
		if (!($actual instanceof $class)) {
			$this->fail('Failed asserting that ' . get_class($actual) . " is an instance of class $class");
		}
		if ($message) {
			$this->match($message, $actual->getMessage());
		}
	}



	/**
	 * Initializes shutdown handler.
	 * @return void
	 */
	public function handler($handler)
	{
		ob_start();
		register_shutdown_function($handler);
	}



	/**
	 * Compares results.
	 * @param  string
	 * @param  string
	 * @return bool
	 */
	public function assertMatch($expected, $actual)
	{
		$expected = rtrim(preg_replace("#[\t ]+\n#", "\n", str_replace("\r\n", "\n", $expected)));
		$actual = rtrim(preg_replace("#[\t ]+\n#", "\n", str_replace("\r\n", "\n", $actual)));

		$re = strtr($expected, array(
			'%a%' => '[^\r\n]+',    // one or more of anything except the end of line characters
			'%a?%'=> '[^\r\n]*',    // zero or more of anything except the end of line characters
			'%A%' => '.+',          // one or more of anything including the end of line characters
			'%A?%'=> '.*',          // zero or more of anything including the end of line characters
			'%s%' => '[\t ]+',      // one or more white space characters except the end of line characters
			'%s?%'=> '[\t ]*',      // zero or more white space characters except the end of line characters
			'%S%' => '\S+',         // one or more of characters except the white space
			'%S?%'=> '\S*',         // zero or more of characters except the white space
			'%c%' => '[^\r\n]',     // a single character of any sort (except the end of line)
			'%d%' => '[0-9]+',      // one or more digits
			'%d?%'=> '[0-9]*',      // zero or more digits
			'%i%' => '[+-]?[0-9]+', // signed integer value
			'%f%' => '[+-]?\.?\d+\.?\d*(?:[Ee][+-]?\d+)?', // floating point number
			'%h%' => '[0-9a-fA-F]+',// one or more HEX digits
			'%ns%'=> '(?:[_0-9a-zA-Z\\\\]+\\\\|N)?',// PHP namespace
			'%[^' => '[^',          // reg-exp
			'%['  => '[',           // reg-exp
			']%'  => ']+',          // reg-exp

			'.' => '\.', '\\' => '\\\\', '+' => '\+', '*' => '\*', '?' => '\?', '[' => '\[', '^' => '\^', ']' => '\]', '$' => '\$', '(' => '\(', ')' => '\)', // preg quote
			'{' => '\{', '}' => '\}', '=' => '\=', '!' => '\!', '>' => '\>', '<' => '\<', '|' => '\|', ':' => '\:', '-' => '\-', "\x00" => '\000', '#' => '\#', // preg quote
		));

		$old = ini_set('pcre.backtrack_limit', '1000000');
		$res = preg_match("#^$re$#s", $actual);
		ini_set('pcre.backtrack_limit', $old);
		if ($res === FALSE || preg_last_error()) {
			throw new Exception("Error while executing regular expression.");
		}
		if (!$res) {
			$this->fail('Failed asserting that ' . $actual . ' matches expected ' . $expected);
		}
	}



	/**
	 * Purges directory.
	 * @param  string
	 * @return void
	 */
	public function purge($dir)
	{
		@mkdir($dir); // @ - directory may already exist
		foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), RecursiveIteratorIterator::CHILD_FIRST) as $entry) {
			if ($entry->getBasename() === '.gitignore') {
				// ignore
			} elseif ($entry->isDir()) {
				rmdir($entry);
			} else {
				unlink($entry);
			}
		}
	}



	/**
	 * Log info.
	 * @return void
	 */
	public function note($message)
	{
		$this->notes[] = $message;
	}



	/**
	 * Returns notes.
	 * @return array
	 */
	public function fetchNotes()
	{
		$res = $this->notes;
		$this->notes = array();
		return $res;
	}

}