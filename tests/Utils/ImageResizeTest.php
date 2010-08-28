<?php

/**
 * Nette Framework test
 */

use Nette\Image;




/**
 * @package    Nette
 * @subpackage UnitTests
 */
class ImageResizeTest extends TestCase
{

	/**
	 * Nette\Image crop, resize & flip.
	 */
	public function testNetteImageCropResizeFlip()
	{
		$main = Image::fromFile('images/logo.gif');
		$image = clone $main;
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 104, $image->height, 'height' );


		// cropping...
		$image->crop(10, 20, 50, 300);
		$this->assertSame( 50, $image->width, 'width' );

		$this->assertSame( 84, $image->height, 'height' );



		$image = clone $main;
		// resizing X
		$image->resize(150, NULL);
		$this->assertSame( 150, $image->width, 'width' );

		$this->assertSame( 89, $image->height, 'height' );


		$image = clone $main;
		// resizing Y
		$image->resize(NULL, 150);
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 104, $image->height, 'height' );


		$image = clone $main;
		// resizing X Y
		$image->resize(300, 150);
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 104, $image->height, 'height' );


		$image = clone $main;
		// resizing X Y enlarge
		$image->resize(300, 150, Image::ENLARGE);
		$this->assertSame( 254, $image->width, 'width' );

		$this->assertSame( 150, $image->height, 'height' );


		$image = clone $main;
		// resizing X Y enlarge stretch
		$image->resize(300, 100, Image::ENLARGE | Image::STRETCH);
		$this->assertSame( 300, $image->width, 'width' );

		$this->assertSame( 100, $image->height, 'height' );


		$image = clone $main;
		// resizing X Y stretch
		$image->resize(300, 100, Image::STRETCH);
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 100, $image->height, 'height' );


		$image = clone $main;
		// resizing X%
		$image->resize('110%', NULL);
		$this->assertSame( 194, $image->width, 'width' );

		$this->assertSame( 115, $image->height, 'height' );


		$image = clone $main;
		// resizing X% Y%
		$image->resize('110%', '90%');
		$this->assertSame( 194, $image->width, 'width' );

		$this->assertSame( 94, $image->height, 'height' );


		$image = clone $main;
		// flipping X
		$image->resize(-150, NULL);
		$this->assertSame( 150, $image->width, 'width' );

		$this->assertSame( 89, $image->height, 'height' );


		$image = clone $main;
		// flipping Y
		$image->resize(NULL, -150);
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 104, $image->height, 'height' );


		$image = clone $main;
		// flipping X Y
		$image->resize(-300, -150);
		$this->assertSame( 176, $image->width, 'width' );

		$this->assertSame( 104, $image->height, 'height' );
	}

}
