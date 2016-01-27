<?php

namespace Torounit\WPBuiltInServerHelper;

require_once "Rewrite.php";

add_action( 'plugins_loaded', function(){

	new Rewrite();

} );