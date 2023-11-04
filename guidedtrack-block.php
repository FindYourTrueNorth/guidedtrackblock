<?php
/**
 * Plugin Name:       Guidedtrack Block
 * Description:       Block for embedding Guidedtrack content
 * Requires at least: 6.1
 * Requires PHP:      7.0

 * Author:            Tim Lindgren
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fguidedtrack-block
 *
 * @package           guidedtrackblock
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function guidedtrackblock_h5p_block_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'guidedtrackblock_h5p_block_block_init' );


/* From Guidedtrack embed instructions  */ 
function custom_add_meta_tags() {
    echo '<meta name="referrer" content="strict-origin-when-cross-origin">';
}
add_action( 'wp_head', 'custom_add_meta_tags' );


function custom_enqueue_scripts() {
    // Check if jQuery is already enqueued, if not, then enqueue it
    if( !wp_script_is('jquery', 'enqueued') ){
        wp_enqueue_script( 'custom-jquery-gt', 'https://www.guidedtrack.com/assets/jquery_gt.js', array(), null, true );
    }

    // Check if Bootstrap JS is already enqueued, if not, then enqueue it
    if( !wp_script_is('bootstrap-js', 'enqueued') ){
        wp_enqueue_script( 'custom-bootstrap-js', 'https://www.guidedtrack.com/assets/bootstrap.min.js', array('jquery'), null, true );
    }

    wp_enqueue_script( 'custom-gt-interpreter', 'https://www.guidedtrack.com/assets/gt_interpreter.js', array('jquery'), null, true );

    // Check if Bootstrap CSS is already enqueued, if not, then enqueue it
    if( !wp_style_is('bootstrap-css', 'enqueued') ){
        wp_enqueue_style( 'custom-bootstrap-css', 'https://www.guidedtrack.com/assets/bootstrap.css' );
    }

    wp_enqueue_style( 'custom-guidedtrack-css', 'https://www.guidedtrack.com/assets/guidedtrack.css' );
}
add_action( 'enqueue_block_assets', 'custom_enqueue_scripts' );



// Plugn Update Checker
// https://github.com/YahnisElsts/plugin-update-checker/
// Plugn Update Checker
// https://github.com/YahnisElsts/plugin-update-checker/
require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/tlindgren/guidedtrackblock/',
	__FILE__,
	'guidedtrack-block'
);

$myUpdateChecker->getVcsApi()->enableReleaseAssets();

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

$myUpdateChecker->getVcsApi()->enableReleaseAssets();