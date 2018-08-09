<?php
/**
 * BLOCK: Basic Editable Text Block
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Enqueue editor assets
function bzo_block_editor_assets() {
	// Scripts
	wp_enqueue_script(
		'bzo-block', // Handle
		plugins_url( 'block.js', __FILE__ ), // Block.js
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);
	// Styles
	wp_enqueue_style(
		'bzo-block-editor', // Handle
		plugins_url( '../editor.css', __FILE__ ), // Block editor CSS
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it
		filemtime( plugin_dir_path( __FILE__ ) . '../editor.css' ) // filemtime — Gets file modification time.
	);
} 
// Hook: Editor assets
add_action( 'enqueue_block_editor_assets', 'bzo_block_editor_assets' );


// Enqueue block specific front-end assets
function bzo_block_frontend_assets() {
	// Styles
	wp_enqueue_style(
		'bzo-block-frontend', // Handle
		plugins_url( '../style.css', __FILE__ ), // Block frontend CSS
		array( 'wp-blocks' ), // Dependency to include the CSS after it
		filemtime( plugin_dir_path( __FILE__ ) . '../editor.css' ) // filemtime — Gets file modification time
	);
} 
// Hook: Frontend assets
add_action( 'enqueue_block_assets', 'bzo_block_frontend_assets' );