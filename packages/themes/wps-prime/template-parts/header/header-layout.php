<?php
/**
 * The main header layout component.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
	* If hook doesn't have action hide the html
	*/
if ( true === has_action( 'theme_header_left' ) ) : ?>
	<div <?php wps_header_left_class(); ?>>
		<?php do_action( 'theme_header_left' ); ?>
	</div>
	<?php
endif;

if ( true === has_action( 'theme_header_right' ) ) :
	?>
	<div<?php wps_header_right_class(); ?>>
		<div class="header-items-wrapper">
			<?php do_action( 'theme_header_right' ); ?>
		</div>
	</div>
	<?php
endif;
