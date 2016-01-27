<?php
/**
 * Plugin Name: Built-in Server Helper
 * Version: 1.0.0
 * Description: Helper for development WordPress Site with PHP built-in server.
 * Author: Toro_Unit
 * Author URI: http://torounit.com
 * Plugin URI: https://github.com/torounit/wp-built-in-server-helper
 * Text Domain: built-in-server-helper
 * Domain Path: /languages
 * @package wp-built-in-server-helper
 */


function built_in_server_helper_notices() {
	echo '<div class="error"><p>[Built-in Server Helper] Built-in Server Helper do not support multisite.</p></div>';
}


if ( is_multisite() ) {

	add_action( 'admin_notices', 'built_in_server_helper_notices' );

} else if ( version_compare( phpversion(), '5.4', '>=' ) ) {
	require dirname( __FILE__ ) . '/src/bootstrap.php';
}