<?php
/**
 * List social media contact list.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Shortcodes\SocialLinks;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_shortcode( 'wps_social_links', __NAMESPACE__ . '\\social_links_shortcode' );

/**
 * Social media list shortcode
 *
 * @param string $atts Shortcode settings.
 * @return string|array
 */
function social_links_shortcode( $atts ):string { // phpcs:ignore
	$options = shortcode_atts(
		[
			'list'        => false,
			'link_class'  => '',
			'label_class' => '',
			'target'      => '',
			'list_class'  => '',
		],
		$atts
	);

	$output          = '';
	$list_start      = '';
	$list_end        = '';
	$list_item_start = '';
	$list_item_end   = '';

	$hide_label = $options['list'] ? '' : 'u-hide';

	$class_link  = \WpsPrime\Helpers\generate_css_class_list( [ 'c-social-list__link', $options['link_class'] ], true );
	$class_list  = \WpsPrime\Helpers\generate_css_class_list( [ 'c-social-list', $options['list_class'] ], true );
	$class_label = \WpsPrime\Helpers\generate_css_class_list( [ 'c-social-list__label', $options['label_class'], $hide_label ], true );

	$target = $options['target'] ? 'target="_blank"' : '';

	$social_list = [
		'facebook',
		'instagram',
		'twitter',
		'linkedin',
		'google',
		'youtube',
		'flickr',
		'vimeo',
		'pinterest',
		'medium',
	];

	if ( $options['list'] ) {
		$list_start      = '<ul class="' . $class_list . '">';
		$list_end        = '</ul>';
		$list_item_start = '<li class="c-social-list__item">';
		$list_item_end   = '</li>';
	}

	foreach ( $social_list as $social ) {
			$url = get_option( 'wps_social_link_' . $social );
		if ( $url ) {
			$output .= $list_item_start . '<a href="' . esc_url( $url ) . '" class="' . esc_attr( $class_link ) . '" ' . $target . '>' . \WpsPrime\Helpers\theme_icon( $social ) . '<span class="' . esc_attr( $class_label ) . '"> ' . ucfirst( $social ) . ' </span></a>' . $list_item_end;
		}
	}

	return $list_start . $output . $list_end;
}
