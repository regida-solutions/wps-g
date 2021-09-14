<?php
/**
 * Template part for displaying custom 404 page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$page_id   = get_option( 'wps_404_custom_page' );
$title_vis = true;

if ( 'page' === get_post_type( $page_id ) ) :

	// Query the 404 page selected from the theme options panel.
	$new_query = new WP_Query( [ 'page_id' => $page_id ] );

	if ( $new_query->have_posts() ) :

		while ( $new_query->have_posts() ) :
			$new_query->the_post();

			$show_title = get_post_meta( get_the_ID(), 'page_title_visibility', true );

			if ( isset( $show_title ) ) {
				$title_vis = ! ( 'hide' === $show_title );
			}

			?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( $title_vis ) { ?>

		<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php } ?>

		<div class="entry-content">
			<?php the_content(); ?>

		</div><!-- .entry-content -->

	</article><!-- #post-## -->

			<?php
	endwhile; // End of the loop.
		wp_reset_postdata();  // Restore global post data stomped by the_post().
		?>

	<?php else : ?>
		<p><?php esc_attr_e( 'Sorry, no posts matched your criteria.', 'wps-prime' ); ?></p>
	<?php endif; ?>


<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'default-404' ); ?>

<?php endif; ?>
