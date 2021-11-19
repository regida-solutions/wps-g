<?php
/**
 * The main template file
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

get_header(); ?>
	<div id="primary" <?php post_class(); ?>>
			<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php endif; ?>
				<div class="wps-post-list">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
					?>
				</div>
				<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
