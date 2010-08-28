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
class HttpRequestFilesTest extends TestCase
{

	/**
	 * Nette\Web\HttpRequest files.
	 */
	public function testHttpRequestFiles()
	{
		// Setup environment
		$_FILES = array(
			'file1' => array(
				'name' => 'readme.txt',
				'type' => 'text/plain',
				'tmp_name' => 'C:\\PHP\\temp\\php1D5B.tmp',
				'error' => 0,
				'size' => 209,
			),

			'file2' => array(
				'name' => array(
					2 => 'license.txt',
				),

				'type' => array(
					2 => 'text/plain',
				),

				'tmp_name' => array(
					2 => 'C:\\PHP\\temp\\php1D5C.tmp',
				),

				'error' => array(
					2 => 0,
				),

				'size' => array(
					2 => 3013,
				),
			),

			'file3' => array(
				'name' => array(
					'y' => array(
						'z' => 'default.htm',
					),
					1 => 'logo.gif',
				),

				'type' => array(
					'y' => array(
						'z' => 'text/html',
					),
					1 => 'image/gif',
				),

				'tmp_name' => array(
					'y' => array(
						'z' => 'C:\\PHP\\temp\\php1D5D.tmp',
					),
					1 => 'C:\\PHP\\temp\\php1D5E.tmp',
				),

				'error' => array(
					'y' => array(
						'z' => 0,
					),
					1 => 0,
				),

				'size' => array(
					'y' => array(
						'z' => 26320,
					),
					1 => 3519,
				),
			),
		);

		$request = new HttpRequest;

		$this->assertTrue( $request->files['file1'] instanceof HttpUploadedFile );
		$this->assertTrue( $request->files['file2'][2] instanceof HttpUploadedFile );
		$this->assertTrue( $request->files['file3']['y']['z'] instanceof HttpUploadedFile );
		$this->assertTrue( $request->files['file3'][1] instanceof HttpUploadedFile );

		$this->assertFalse( isset($request->files['file0']) );
		$this->assertTrue( isset($request->files['file1']) );

		$this->assertNull( $request->getFile('file1', 'a') );
	}

}
