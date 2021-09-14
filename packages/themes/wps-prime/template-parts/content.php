<?php
/**
 * Template part for displaying posts.
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
<article id="post-<?php the_ID(); ?>" <?php post_class( 'wps-post' ); ?>>
	<div class="entry-wrapper">
		<?php
		if ( has_post_thumbnail() ) :
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php the_post_thumbnail( 'wps_masonry_large', [ 'class' => 'entry-image' ] ); ?>
			</a>
		<?php endif; ?>
		<header class="entry-header">
			<div class="entry-meta">
				<div class="entry-meta__date"><?php echo get_the_date(); ?></div>
			</div>
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php echo wp_kses_post( WpsPrime\Setup\Excerpt\excerpt( 120 ) ); ?>
		</div><!-- .entry-content -->
		<a class="read-more-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'More', 'wps-prime' ); ?></a>
	</div><!-- .entry-wrapper -->
</article><!-- #post-## -->
