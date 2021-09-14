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

$pty       = get_post_type( get_the_ID() );
$pt_object = get_post_type_object( $pty );

// Don't print empty markup if there's nowhere to navigate.
$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
$next     = get_adjacent_post( false, '', false );

if ( ! $next && ! $previous ) {
	return;
}
?>
<nav class="navigation post-navigation">
	<h1 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'wps-prime' ); ?></h1>
	<div class="nav-links">
		<?php
		previous_post_link(
			'<div class="nav-previous">%link</div>',
			'<div class="nav-fig"><span class="nav__item-title">%title</span></div><small class="nav__item-link">' . \WpsPrime\Helpers\theme_icon( 'arrow_left' ) . sprintf(
			/* translators: %s post title */
				_x( 'Previous %s', 'Previous post link', 'wps-prime' ),
				$pt_object->labels->singular_name
			) . '</small>'
		);

		next_post_link(
			'<div class="nav-next">%link</div>',
			'<div class="nav-fig"><span class="nav__item-title">%title</span></div><small class="nav__item-link">' . sprintf(
			/* translators: %s post title */
				_x( 'Next %s', 'Next post link', 'wps-prime' ),
				$pt_object->labels->singular_name
			) . \WpsPrime\Helpers\theme_icon( 'arrow_right' ) . '</small>'
		);
		?>
	</div><!-- .nav-links -->
</nav><!-- .navigation -->
