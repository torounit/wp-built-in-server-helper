<?php

namespace Torounit\WPBuiltInServerHelper;

Class Rewrite {


	/**
	 * BuiltInServerHelper constructor.
	 */
	public function __construct() {

		add_filter( 'got_url_rewrite', [ $this, 'got_url_rewrite' ] );
		add_filter( 'pre_update_option_permalink_structure', [ $this, 'permalink_structure_filter' ] );

	}

	/**
	 * @param $current
	 *
	 * @return bool
	 */
	public function got_url_rewrite( $current ) {
		if ( $this->is_built_in_server() and ! $this->exsist_permalink_extension( get_option( 'permalink_structure' ) ) ) {
			return true;
		}

		return $current;
	}

	/**
	 * @return bool
	 */
	private function is_built_in_server() {
		$expect = 'cli-server';
		$actual = php_sapi_name();

		return ( $expect == $actual );
	}

	/**
	 * @return bool
	 */
	private function exsist_permalink_extension( $permalink_structure ) {
		return (bool) strpos( $permalink_structure, '.' );
	}

	/**
	 * @param $value
	 *
	 * @return string
	 */
	public function permalink_structure_filter( $value ) {
		$structure =  ltrim( str_replace( 'index.php' , '', $value ), '/' );
		if( $this->exsist_permalink_extension( $structure ) ) {
			return '/index.php/' . $structure;
		}
		return '/'.$structure;
	}

}