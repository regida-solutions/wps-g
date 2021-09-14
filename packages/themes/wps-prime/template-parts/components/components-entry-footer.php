<?php
/**
 * Article footer section.
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
}?>

<div class="entry-meta-content">

	<?php
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'wps-prime' ) );
		if ( $categories_list && wps_prime_categorized_blog() ) {
			printf(
			/* translators: %1$s a list of categories */
				'<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wps-prime' ) . '</span>',
				wp_kses_post( $categories_list )
			);
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wps-prime' ) );
		if ( $tags_list ) {
			printf(
			/* translators: %1$s a list of categories */
				'<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wps-prime' ) . '</span>',
				wp_kses_post( $tags_list )
			);
		}
	}


	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
		?>
	<span class="comments-link">
		<?php comments_popup_link( esc_html__( 'Leave a comment', 'wps-prime' ), esc_html__( '1 Comment', 'wps-prime' ), esc_html__( '% Comments', 'wps-prime' ) ); ?>
	</span>
		<?php
endif;

	edit_post_link(
		sprintf(
		/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'wps-prime' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
	?>
</div>
