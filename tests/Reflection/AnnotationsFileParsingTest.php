<?php

/**
 * Nette Framework test
 */

use Nette\Reflection\AnnotationsParser,
	Nette\Environment;




/**
 * @package    Nette\Reflection
 * @subpackage UnitTests
 */
class AnnotationsFileParsingTest extends TestCase
{

	/**
	 * Annotations file parser.
	 */
	public function testAnnotationsFileParser()
	{
		require __DIR__ . '/files/annotations.php';



		// temporary directory
		$this->purge(__DIR__ . '/tmp');
		Environment::setVariable('tempDir', __DIR__ . '/tmp');


		AnnotationsParser::$useReflection = FALSE;


		// AnnotatedClass1

		$rc = new ReflectionClass('Nette\AnnotatedClass1');
		$this->assertSame( array(
			'author' => array('john'),
		), AnnotationsParser::getAll($rc) );

		$this->assertSame( array(
			'var' => array('a'),
		), AnnotationsParser::getAll($rc->getProperty('a')), '$a' );

		$this->assertSame( array(
			'var' => array('b'),
		), AnnotationsParser::getAll($rc->getProperty('b')), '$b' );

		$this->assertSame( array(
			'var' => array('c'),
		), AnnotationsParser::getAll($rc->getProperty('c')), '$c' );

		$this->assertSame( array(
			'var' => array('d'),
		), AnnotationsParser::getAll($rc->getProperty('d')), '$d' );

		$this->assertSame( array(
			'var' => array('e'),
		), AnnotationsParser::getAll($rc->getProperty('e')), '$e' );

		$this->assertSame( array(), AnnotationsParser::getAll($rc->getProperty('f')), '$f' );

		// AnnotationsParser::getAll($rc->getProperty('g')), '$g' ); // ignore due PHP bug #50174
		$this->assertSame( array(
			'return' => array('a'),
		), AnnotationsParser::getAll($rc->getMethod('a')), 'a()' );

		$this->assertSame( array(
			'return' => array('b'),
		), AnnotationsParser::getAll($rc->getMethod('b')), 'b()' );

		$this->assertSame( array(
			'return' => array('c'),
		), AnnotationsParser::getAll($rc->getMethod('c')), 'c()' );

		$this->assertSame( array(
			'return' => array('d'),
		), AnnotationsParser::getAll($rc->getMethod('d')), 'd()' );

		$this->assertSame( array(
			'return' => array('e'),
		), AnnotationsParser::getAll($rc->getMethod('e')), 'e()' );

		$this->assertSame( array(), AnnotationsParser::getAll($rc->getMethod('f')), 'f()' );

		$this->assertSame( array(
			'return' => array('g'),
		), AnnotationsParser::getAll($rc->getMethod('g')), 'g()' );


		// AnnotatedClass2

		$rc = new ReflectionClass('Nette\AnnotatedClass2');
		$this->assertSame( array(
			'author' => array('jack'),
		), AnnotationsParser::getAll($rc) );


		// AnnotatedClass3

		$rc = new ReflectionClass('Nette\AnnotatedClass3');
		$this->assertSame( array(), AnnotationsParser::getAll($rc) );
	}

}
