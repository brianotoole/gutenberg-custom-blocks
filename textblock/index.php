<?php
/**
 * BLOCK: Basic Editable Text Block
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's. text.
 *
 * @since 1.0.0
 */
function bzo_block_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'bzo-block', // Handle.
		plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);
	// Styles.
	wp_enqueue_style(
		'bzo-block-editor', // Handle.
		plugins_url( 'editor.css', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
} 
// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'bzo_block_editor_assets' );


/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function bzo_block_frontend_assets() {
	// Styles.
	wp_enqueue_style(
		'bzo-block-frontend', // Handle.
		plugins_url( 'style.css', __FILE__ ), // Block frontend CSS.
		array( 'wp-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
} 
// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'bzo_block_frontend_assets' );