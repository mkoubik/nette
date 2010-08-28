<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\ClassReflection;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class AnnotationsCommentParsing1Test extends TestCase
{

	/**
	 * Annotations comment parser I.
	 */
	public function testAnnotationsCommentParserI()
	{
		/**
		 * @title(value ="Johno's addendum", mode=True,) , out
		 * @title( value= 'One, Two', mode= true or false)
		 * @title( value = 'Three (Four)', mode = 'false')
		 * @components(item 1)
		 * @persistent(true)
		 * @persistent(FALSE)
		 * @persistent(null)
		 * @author true
		 * @author FALSE
		 * @author null
		 * @author
		 * @author John Doe
		 * @renderable
		 */
		class TestClass {

			/** @secured(role = "admin", level = 2) */
			public $foo;

			/** @RolesAllowed('admin', web editor) */
			public function foo()
			{}

		}



		// Class annotations

		$rc = new ClassReflection('TestClass');
		$tmp = $rc->getAnnotations();

		$this->assertSame( "Johno's addendum",  $tmp['title'][0]->value );
		$this->assertTrue( $tmp['title'][0]->mode );
		$this->assertSame( 'One, Two',  $tmp['title'][1]->value );
		$this->assertSame( 'true or false',  $tmp['title'][1]->mode );
		$this->assertSame( 'Three (Four)',  $tmp['title'][2]->value );
		$this->assertSame( 'false',  $tmp['title'][2]->mode );
		$this->assertSame( 'item 1',  $tmp['components'][0] );
		$this->assertTrue( $tmp['persistent'][0], 'persistent' );
		$this->assertFalse( $tmp['persistent'][1] );
		$this->assertNull( $tmp['persistent'][2] );
		$this->assertTrue( $tmp['author'][0], 'author' );
		$this->assertFalse( $tmp['author'][1] );
		$this->assertNull( $tmp['author'][2] );
		$this->assertTrue( $tmp['author'][3] );
		$this->assertSame( 'John Doe',  $tmp['author'][4] );
		$this->assertTrue( $tmp['renderable'][0] );

		$this->assertTrue( $tmp === $rc->getAnnotations(), 'cache test' );
		$this->assertTrue( $tmp !== ClassReflection::from('ReflectionClass')->getAnnotations(), 'cache test' );

		$this->assertTrue( $rc->hasAnnotation('title'), "has('title')' );
		$this->assertSame( 'Three (Four)",  $rc->getAnnotation('title')->value );
		$this->assertSame( 'false',  $rc->getAnnotation('title')->mode );

		$tmp = $rc->getAnnotations('title');
		/*
		$this->assertSame( "Johno's addendum",  $tmp[0]->value );
		$this->assertTrue( $tmp[0]->mode );
		$this->assertSame( 'One, Two',  $tmp[1]->value );
		$this->assertSame( 'true or false',  $tmp[1]->mode );
		$this->assertSame( 'Three (Four)',  $tmp[2]->value );
		$this->assertSame( 'false',  $tmp[2]->mode );
		*/

		$this->assertTrue( $rc->hasAnnotation('renderable'), "has('renderable')" );
		$this->assertTrue( $rc->getAnnotation('renderable'), "get('renderable')" );
		/*
		$tmp = $rc->getAnnotations('renderable');
		$this->assertTrue( $tmp[0] );
		$tmp = $rc->getAnnotations('persistent');
		*/
		$this->assertNull( $rc->getAnnotation('persistent'), "get('persistent')" );
		/*
		$this->assertTrue( $tmp[0] );
		$this->assertFalse( $tmp[1] );
		$this->assertNull( $tmp[2] );
		*/

		$this->assertFalse( $rc->hasAnnotation('xxx'), "has('xxx')" );
		$this->assertNull( $rc->getAnnotation('xxx'), "get('xxx')" );


		// Method annotations

		$rm = $rc->getMethod('foo');
		$tmp = $rm->getAnnotations();

		$this->assertSame( 'admin',  $tmp['RolesAllowed'][0][0] );
		$this->assertSame( 'web editor',  $tmp['RolesAllowed'][0][1] );


		// Property annotations

		$rp = $rc->getProperty('foo');
		$tmp = $rp->getAnnotations();

		$this->assertSame( 'admin',  $tmp['secured'][0]->role );
		$this->assertSame( 2,  $tmp['secured'][0]->level );
	}

}
