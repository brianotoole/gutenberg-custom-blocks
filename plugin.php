<?php
/**
 * Plugin Name: Custom Gutenberg Blocks
 * Plugin URI: #
 * Description: Testing gutenberg blocks
 * Author: Brian O'Toole
 * Author URI: https://brianzotoole.com
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

// Init blocks
require_once plugin_dir_path( __FILE__ ) . 'textblock/index.php';