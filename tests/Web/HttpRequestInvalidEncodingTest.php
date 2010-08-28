<?php

/**
 * Nette Framework test
 */

use Nette\Web\HttpRequest,
	Nette\Web\HttpUploadedFile;




/**
 * @package    Nette\Web
 * @subpackage UnitTests
 */
class HttpRequestInvalidEncodingTest extends TestCase
{

	/**
	 * Nette\Web\HttpRequest invalid encoding.
	 */
	public function testHttpRequestInvalidEncoding()
	{
		// Setup environment
		define('INVALID', "\x76\xC4\xC5\xBE");
		define('CONTROL_CHARACTERS', "A\x00B\x80C");

		$_GET = array(
			'invalid' => INVALID,
			'control' => CONTROL_CHARACTERS,
			INVALID => '1',
			CONTROL_CHARACTERS => '1',
			'array' => array(INVALID => '1'),
		);

		$_POST = array(
			'invalid' => INVALID,
			'control' => CONTROL_CHARACTERS,
			INVALID => '1',
			CONTROL_CHARACTERS => '1',
			'array' => array(INVALID => '1'),
		);

		$_COOKIE = array(
			'invalid' => INVALID,
			'control' => CONTROL_CHARACTERS,
			INVALID => '1',
			CONTROL_CHARACTERS => '1',
			'array' => array(INVALID => '1'),
		);

		$_FILES = array(
			INVALID => array(
				'name' => 'readme.txt',
				'type' => 'text/plain',
				'tmp_name' => 'C:\\PHP\\temp\\php1D5B.tmp',
				'error' => 0,
				'size' => 209,
			),
			CONTROL_CHARACTERS => array(
				'name' => 'readme.txt',
				'type' => 'text/plain',
				'tmp_name' => 'C:\\PHP\\temp\\php1D5B.tmp',
				'error' => 0,
				'size' => 209,
			),
			'file1' => array(
				'name' => INVALID,
				'type' => 'text/plain',
				'tmp_name' => 'C:\\PHP\\temp\\php1D5B.tmp',
				'error' => 0,
				'size' => 209,
			),
		);

		// unfiltered data
		$request = new HttpRequest;

		$this->assertTrue( $request->getQuery('invalid') === INVALID );
		$this->assertTrue( $request->getQuery('control') === CONTROL_CHARACTERS );
		$this->assertSame( '1', $request->getQuery(INVALID) );
		$this->assertSame( '1', $request->getQuery(CONTROL_CHARACTERS) );
		$this->assertSame( '1', $request->query['array'][INVALID] );

		$this->assertTrue( $request->getPost('invalid') === INVALID );
		$this->assertTrue( $request->getPost('control') === CONTROL_CHARACTERS );
		$this->assertSame( '1', $request->getPost(INVALID) );
		$this->assertSame( '1', $request->getPost(CONTROL_CHARACTERS) );
		$this->assertSame( '1', $request->post['array'][INVALID] );

		$this->assertTrue( $request->getCookie('invalid') === INVALID );
		$this->assertTrue( $request->getCookie('control') === CONTROL_CHARACTERS );
		$this->assertSame( '1', $request->getCookie(INVALID) );
		$this->assertSame( '1', $request->getCookie(CONTROL_CHARACTERS) );
		$this->assertSame( '1', $request->cookies['array'][INVALID] );

		$this->assertTrue( $request->getFile(INVALID) instanceof HttpUploadedFile );
		$this->assertTrue( $request->getFile(CONTROL_CHARACTERS) instanceof HttpUploadedFile );
		$this->assertTrue( $request->files['file1'] instanceof HttpUploadedFile );


		// filtered data
		$request->setEncoding('UTF-8');

		$this->assertSame( "v\xc5\xbe", $request->getQuery('invalid') );
		$this->assertSame( 'ABC', $request->getQuery('control') );
		$this->assertNull( $request->getQuery(INVALID) );
		$this->assertNull( $request->getQuery(CONTROL_CHARACTERS) );
		$this->assertFalse( isset($request->query['array'][INVALID]) );

		$this->assertSame( "v\xc5\xbe", $request->getPost('invalid') );
		$this->assertSame( 'ABC', $request->getPost('control') );
		$this->assertNull( $request->getPost(INVALID) );
		$this->assertNull( $request->getPost(CONTROL_CHARACTERS) );
		$this->assertFalse( isset($request->post['array'][INVALID]) );

		$this->assertSame( "v\xc5\xbe", $request->getCookie('invalid') );
		$this->assertSame( 'ABC', $request->getCookie('control') );
		$this->assertNull( $request->getCookie(INVALID) );
		$this->assertNull( $request->getCookie(CONTROL_CHARACTERS) );
		$this->assertFalse( isset($request->cookies['array'][INVALID]) );

		$this->assertNull( $request->getFile(INVALID) );
		$this->assertNull( $request->getFile(CONTROL_CHARACTERS) );
		$this->assertTrue( $request->files['file1'] instanceof HttpUploadedFile );
		$this->assertSame( "v\xc5\xbe", $request->files['file1']->name );
	}

}
