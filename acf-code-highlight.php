<?php

/*
Plugin Name: Advanced Custom Fields: Code Highlight
Description: A code highlighter for ACF
Version: 1.0.0
Author: Thomas van Aart
Author URI: me@thomasvanaart.nl
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

load_plugin_textdomain( 'acf-code-highlight', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );

function include_field_types_code_highlight( $version ) {
	
	include_once('acf-code-highlight-v5.php');
	
}

add_action('acf/include_field_types', 'include_field_types_code_highlight');
	
?>