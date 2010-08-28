<?php

/**
 * Nette Framework test
 */

use Nette\Image;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ImageFlipTest extends TestCase
{

	/**
	 * Nette\Image flip.
	 */
	public function testNetteImageFlip()
	{
		$image = Image::fromFile('images/logo.gif');
		$flipped = $image->resize(-100, -100);

		$this->assertSame(file_get_contents(__DIR__ . '/Image.flip.expect'), $flipped->toString(Image::GIF));
	}

}
