<?php

/**
 * Nette Framework test
 */

use Nette\Image;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ImageFactoriesTest extends TestCase
{

	/**
	 * Nette\Image factories.
	 */
	public function testNetteImageFactories()
	{
		$image = Image::fromFile('images/logo.gif');
		// logo.gif
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 104, $image->height, 'height' );


		$image = Image::fromBlank(200, 300, Image::rgb(255, 128, 0));
		// blank
		$this->assertSame( 200, $image->width, 'width' );

		$this->assertSame( 300, $image->height, 'height' );
	}

}
