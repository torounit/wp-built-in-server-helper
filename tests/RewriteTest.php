<?php

use Torounit\WPBuiltInServerHelper\Rewrite;

/**
 * @property Rewrite rewrite
 */
class RewriteTest extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp(); // TODO: Change the autogenerated stub
		$this->rewrite = new Rewrite();
	}

	/**
	 * @test
	 */
	function test_exsist_permalink_extension() {


		$method = new ReflectionMethod( 'Torounit\WPBuiltInServerHelper\Rewrite', 'exsist_permalink_extension' );
		$method->setAccessible( true );

		$this->assertTrue( $method->invoke( $this->rewrite, '/archives/%post_id%.html' ) );
		$this->assertTrue( $method->invoke( $this->rewrite, '/archives/%post_id%.php' ) );
		$this->assertFalse( $method->invoke( $this->rewrite, '/archives/%post_id%'  ) );
	}

	/**
	 * @test
	 */
	function test_change_permalink_structure_filter() {

		update_option( 'permalink_structure',  '/archives/%post_id%' );
		$this->assertEquals( '/archives/%post_id%', get_option( 'permalink_structure' ) );

		update_option( 'permalink_structure',  '/index.php/archives/%post_id%' );
		$this->assertEquals( '/archives/%post_id%', get_option( 'permalink_structure' ) );

		update_option( 'permalink_structure',  '/archives/%post_id%.php' );
		$this->assertEquals( '/index.php/archives/%post_id%.php', get_option( 'permalink_structure' ) );

		update_option( 'permalink_structure',  '/index.php/archives/%post_id%.php' );
		$this->assertEquals( '/index.php/archives/%post_id%.php', get_option( 'permalink_structure' ) );
	}

	/**
	 * @test
	 */
	function test_permalink_structure_filter() {
		$this->assertEquals( '/archives/%post_id%', $this->rewrite->permalink_structure_filter( '/archives/%post_id%' ) );
		$this->assertEquals( '/archives/%post_id%', $this->rewrite->permalink_structure_filter( '/index.php/archives/%post_id%' ) );
		$this->assertEquals( '/index.php/archives/%post_id%.php', $this->rewrite->permalink_structure_filter( '/archives/%post_id%.php' ) );
		$this->assertEquals( '/index.php/archives/%post_id%.php', $this->rewrite->permalink_structure_filter( '/index.php/archives/%post_id%.php' ) );

	}
}

