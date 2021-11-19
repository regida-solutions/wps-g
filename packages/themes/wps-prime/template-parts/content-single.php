<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="entry-intro">' . get_the_post_thumbnail(
			get_the_ID(),
			'wps_masonry_large',
			[
				'class' => 'entry-featured-image',
				'title' => get_the_title( get_the_ID() ),
			]
		) . '</div>';
	}
	?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php get_template_part( 'template-parts/components/components-posted-on' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				[
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wps-prime' ),
					'after'  => '</div>',
				]
			);
			?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php get_template_part( 'template-parts/components/components-entry-footer' ); ?>
		<?php do_action( 'wps_single_entry_footer' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
