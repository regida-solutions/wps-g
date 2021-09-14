<?php
/**
 * The template for displaying the default content of the 404 pages.
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
<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wps-prime' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
		<?php if ( current_user_can( 'moderate_comments' ) ) : ?>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'wps-prime' ); ?></p>

			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

		<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
