<?php

/**
 * Nette Framework test
 */

use Nette\Image;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ImageRotateTest extends TestCase
{

	/**
	 * Nette\Image rotating.
	 */
	public function testNetteImageRotating()
	{
		if (GD_BUNDLED === 0) {
			$this->skip('Requires PHP extension GD in bundled version.');
		}



		$image = Image::fromFile('images/logo.gif');
		$image->rotate(30, Image::rgb(0, 0, 0));

		$this->assertSame(file_get_contents(__DIR__ . '/Image.rotate.expect'), $image->toString(Image::GIF));
	}

}
