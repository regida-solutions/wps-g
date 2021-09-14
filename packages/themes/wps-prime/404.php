<?php
/**
 * The template for displaying 404 pages (not found).
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

	<div id="primary" <?php wps_entry_content_class(); ?>>
		<?php if ( get_option( 'wps_404_custom_page' ) ) : ?>
			<?php get_template_part( 'template-parts/content', 'custom-404' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'default-404' ); ?>

		<?php endif; ?>
	</div><!-- #primary -->

<?php
get_footer();
