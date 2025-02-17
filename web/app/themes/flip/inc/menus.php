<?php
add_action( 'after_setup_theme', function () {
	register_nav_menus( [
		'main-menu'         => esc_html__( 'Primary', 'flip' ),
		'explore-menu'      => esc_html__( 'Explore Menu', 'flip' ),
		'organisation-menu' => esc_html__( 'Organisation Menu', 'flip' ),
		'terms-menu'        => esc_html__( 'Terms Menu', 'flip' ),
		'main-menu'         => esc_html__( 'Primary', 'flip' ),
	] );
} );

/**
 * @param $classes
 * @param $item
 * @param $args
 *
 * @return mixed
 */
add_filter( 'nav_menu_css_class', 'filter_bootstrap_nav_menu_css_class', 10, 3 ); 
function filter_bootstrap_nav_menu_css_class( $classes, $item, $args ) {
	if ( isset( $args->bootstrap ) ) {
		
		$classes[] = ( $item->object_id == get_the_ID() ) ? 'nav-item current' : 'nav-item';

		if ( in_array( 'menu-item-has-children', $classes ) ) { 
			$classes[] = 'dropdown';
		}

		if ( in_array( 'dropdown-header', $classes ) ) {
			unset( $classes[ array_search( 'dropdown-header', $classes ) ] );
		}
	}
	

	return $classes;
}

/**
 * Add bootstrap attributes to individual link elements.
 *
 * @param $atts
 * @param $item
 * @param $args
 * @param $depth
 *
 * @return mixed
 */

add_filter( 'nav_menu_link_attributes', 'filter_bootstrap_nav_menu_link_attributes', 10, 4 );
function filter_bootstrap_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

	if ( isset( $args->bootstrap ) ) {
		if ( ! isset( $atts['class'] ) ) {
			$atts['class'] = '';
		}

		if ( $depth > 0 ) {
			if ( in_array( 'dropdown-header', $item->classes ) ) {
				$atts['class'] = 'dropdown-header';
			} else {
				$atts['class'] .= 'dropdown-item';
			}

			if ( $item->description ) {
				$atts['class'] .= ' has-description';
			}
		} else {
			$atts['class'] .= 'nav-link';
			$atts['data-hover'] = $item->title;
			if ( in_array( 'menu-item-has-children', $item->classes ) ) {
				$atts['class']         .= ' dropdown-toggle';
				$atts['role']          = 'button';
				$atts['data-toggle']   = 'dropdown';
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
			}
		}
	}

	return $atts;
}

/**
 * Add bootstrap classes to dropdown menus.
 *
 * @param $classes
 * @param $args
 * @param $depth
 *
 * @return mixed
 */

add_filter( 'nav_menu_submenu_css_class', 'filter_bootstrap_nav_menu_submenu_css_class', 10, 3 );
function filter_bootstrap_nav_menu_submenu_css_class( $classes, $args, $depth ) {
	if ( isset( $args->bootstrap ) ) {
		$classes[] = 'dropdown-menu';
	}

	return $classes;
}