<?php
/**
 * Plugin Name: WP Rocket | Enfold compatibility fix
 * Description: Disables LazyLoad for pages containing Enfold masonry elements.
 * Version: 1.0
 * Author:      PingWeb
 * Author URI:  https://www.pingweb.nl/
 * License:     GNU General Public License v3
 * License URI: http://www.gnu.org/licenses/gpl.html
 *
 * Copyright PingWeb 2018
 */

namespace WP_Rocket\Helpers\lazyload\no_lazyload;
defined( 'ABSPATH' ) or die();

/**
 * Disable LazyLoad if the content contains an Enfold masonry element.
 *
 * @author Bas Cooijmans
 */
function deactivate_containing_masonry() {
	// Disable LazyLoad for images on a 'post' post type singular template.

	global $post;

	if( isset($post->post_content) && (has_shortcode( $post->post_content, 'av_masonry_gallery') || has_shortcode( $post->post_content, 'av_masonry_entries')) ) {

		add_filter( 'do_rocket_lazyload', '__return_false' );
	}
}

add_filter( 'wp', __NAMESPACE__ . '\deactivate_containing_masonry' );