<?php
/**
 * Adjust default WordPress functionality
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup\WpFineTune;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
// Customize Comment Form placeholder Input Text Fields & Labels.
add_filter( 'comment_form_default_fields', __NAMESPACE__ . '\\modify_comment_form_fields' );

// Remove Comment Form Allowed Tags.
add_filter( 'comment_form_defaults', __NAMESPACE__ . '\\customize_comment_form_text_area' );

// Remove wp version param from any enqueued scripts/styles.
if ( get_option( 'wps_remove_assets_version_numbers' ) ) {
	add_filter( 'script_loader_src', __NAMESPACE__ . '\\remove_wp_ver_css_js', 15, 1 );
	add_filter( 'style_loader_src', __NAMESPACE__ . '\\remove_wp_ver_css_js', 15, 1 );
}

// Disable WP default dashicons for logged-out users.
if ( get_option( 'wps_front_disable_dashicons' ) ) {
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\disable_dashicons' );
}

// Disable WP default emoji.
if ( get_option( 'wps_disable_emoji' ) ) {
	add_action( 'init', __NAMESPACE__ . '\\disable_emojis' );
}


if ( ! function_exists( 'modify_comment_form_fields' ) ) {

	/**
	 *  Customize Comment Form placeholder Input Text Fields & Labels
	 *
	 * @param array $fields All the parameters of the comment form fields.
	 * @return array
	 */
	function modify_comment_form_fields( array $fields ):array {

		// Setup Variables.
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? "aria-required='true'" : '' );

		$fields['author'] = sprintf('<p class="comment-form-author"><label for="author" class="comment-form__label">%1$s</label>%2$s<input id="author" class="comment-form__field" name="author" type="text" placeholder="%3$s" value="%4$s" size="30" %5$s/></p>',
			_x( 'Name', 'comment form author name', 'wps-prime' ),
			$req ? '<span class="required">*</span>' : '',
			__( 'Real name, please, no keyword spamming!', 'wps-prime' ),
			esc_attr( $commenter['comment_author'] ),
			$aria_req
		);

		$fields['email'] = sprintf( '<p class="comment-form-email"><label for="email" class="comment-form__label">%1$s</label>%2$s<input id="email" class="comment-form__field" name="email" type="text" placeholder="%3$s" value="%4$s" size="30" %5$s/></p>',
			__( 'E-mail', 'wps-prime' ),
			$req ? '<span class="required">*</span>' : '',
			__( 'add e-mail address', 'wps-prime' ),
			esc_attr( $commenter['comment_author_email'] ),
			$aria_req
		);

		if ( ! get_option( 'wps_disable_comment_url' ) ) {

			$fields['url'] = sprintf( '<p class="comment-form-url"><label for="url" class="comment-form__label">%1$s</label><input id="url" class="comment-form__field" name="url" type="text" placeholder="%2$s" value="%3$s" size="30" /></p>',
				__( 'Domain', 'wps-prime' ),
				__( 'Please Link To Your Own Domain', 'wps-prime' ),
				esc_attr( $commenter['comment_author_url'] )
			);

		} else {
			if ( isset( $fields['url'] ) ) {
				unset( $fields['url'] ); }
		}

		return $fields;
	}
}

if ( ! function_exists( 'customize_comment_form_text_area' ) ) {

	/**
	 * Customize Comment Form Text Area & Label
	 *
	 * @param array $fields All the comment form html elements.
	 * @return array
	 */
	function customize_comment_form_text_area( array $fields ):array {

		// Remove comment form allowed tags.
		$fields['comment_notes_after'] = '';

		$fields['comment_field'] = sprintf( '<p class="comment-form-comment"><label for="comment" class="comment-form__label">%1$s</label><textarea id="comment" class="comment-form__field" name="comment" placeholder="%2$s"cols="45" rows="5" aria-required="true"></textarea></p>',
			_x( 'Comment', '', 'wps-prime' ),
			_x( 'Your Feedback Is Appreciated', '', 'wps-prime' )
		);

		return $fields;
	}
}

/**
 * Remove wp version param from any enqueued scripts/style
 *
 * @param string $src Script string.
 *
 * @return string
 */
function remove_wp_ver_css_js( string $src ):string {
	$parts = explode( '?ver', $src );
	return $parts[0];
}


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', __NAMESPACE__ . '\\disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', __NAMESPACE__ . '\\disable_emojis_remove_dns_prefetch', 10, 2 );
}


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins PW internal plugins.
 * @return array Difference between the two arrays.
 */
function disable_emojis_tinymce( array $plugins = [] ): array {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, [ 'wpemoji' ] );
	} else {
		return [];
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array  $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference between the two arrays.
 */
function disable_emojis_remove_dns_prefetch( array $urls, string $relation_type ):array {
	if ( 'dns-prefetch' === $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, [ $emoji_svg_url ] );
	}

	return $urls;
}
