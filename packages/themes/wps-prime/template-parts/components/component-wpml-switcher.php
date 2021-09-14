<?php
/**
 * WPML Translator switcher
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>
<?php if ( function_exists( 'icl_object_id' ) && get_theme_mod( 'translation_switcher_display', false ) ) : ?>
	<div class="wpml-translator__utility"><?php echo do_shortcode( '[wpml_language_selector_widget]' ); ?></div>
<?php endif; ?>
