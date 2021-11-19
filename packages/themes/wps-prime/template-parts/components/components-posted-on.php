<?php
/**
 * Display navigation to next/previous post when applicable.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$meta_setting = get_option( 'wps_article_meta_visibility' );

if ( $meta_setting ) {
	return;
}

$posted_on = sprintf(
	/* translators: %s the published date */
	esc_html_x( 'Posted on %s', 'post date', 'wps-prime' ),
	'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . \WpsPrime\Helpers\posted_on() . '</a>'
);

$byline = sprintf(
/* translators: %s author link */
	esc_html_x( 'by %s', 'post author', 'wps-prime' ),
	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
);

?>
<div class="entry-meta-content">
	<span class="posted-on"><?php echo wp_kses_post( $posted_on ); ?></span><span class="byline"><?php echo wp_kses_post( $byline ); ?></span>
</div>
