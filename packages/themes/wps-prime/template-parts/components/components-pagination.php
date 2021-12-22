<?php
/**
 * Display navigation to next/previous set of posts when applicable
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$pagination_type = 'link';

	// Don't print empty markup if there's only one page.
if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
	return;
}
$output = '';
?>
<?php if ( 'link' === $pagination_type ) : ?>
	<nav class="navigation paging-navigation">
		<a class="screen-reader-text" href="#post-navigation"><?php esc_html_e( 'Post navigation', 'wps-prime' ); ?></a>
		<div class="nav-links" id="post-navigation">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous">
				<?php
				echo get_next_posts_link(
					sprintf(
					/* translators: %1$s navigation decoration */
					esc_html__( '%1$s Older posts', 'wps-prime' ),
				'<span class="meta-nav">&larr;</span>' ) ); // phpcs:ignore XSS OK
				?>
				</div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next">
				<?php
				echo get_previous_posts_link( sprintf(
					/* translators: %1$s navigation decoration */
					esc_html__( 'Newer posts %1$s', 'wps-prime' ),
				'<span class="meta-nav">&rarr;</span>' ) ); // phpcs:ignore XSS OK
				?>
				</div>
			<?php endif; ?>
		</div><!-- .nav-links -->
		</nav><!-- .navigation -->
	</nav>
<?php else : ?>
	<div class="navigation paging-numbered-navigation"><?php echo wp_kses_post( paginate_links() ); ?></div>
<?php endif; ?>
