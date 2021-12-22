<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

get_header(); ?>

	<section id="primary"<?php wps_entry_content_class(); ?>>
		<?php
		if ( have_posts() ) :
			?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf(
					/* translators: 1: results count number */
					esc_html__( 'Search Results for: %s', 'wps-prime' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			get_template_part( 'template-parts/components/components-pagination' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
