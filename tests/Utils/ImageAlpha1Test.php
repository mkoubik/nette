<?php

/**
 * Nette Framework test
 */

use Nette\Image;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ImageAlpha1Test extends TestCase
{

	/**
	 * Nette\Image alpha channel.
	 */
	public function testNetteImageAlphaChannel()
	{
		ob_start();

		$image = Image::fromBlank(rand(100, 200), 100, Image::rgb(255, 128, 0, 60));
		$image->crop(0, 0, '60%', '60%');
		$image->savealpha(TRUE);
		$image->send(Image::PNG, 100);

		$this->assertSame(file_get_contents(__DIR__ . '/Image.alpha1.expect'), ob_get_clean());
	}

}
