<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>
	<?php do_action( 'content_end' ); ?>
	</div><!-- #content -->
	<?php do_action( 'after_content' ); ?>
	<?php do_action( 'before_footer' ); ?>
		<?php do_action( 'footer_content' ); ?>
	<?php do_action( 'after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
