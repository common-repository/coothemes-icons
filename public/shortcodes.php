<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Function to process our shortcode and render our WP SVG Icon
 *
 * @link       https://www.coothemes.com/coothemes-icons/
 * @since      1.0.0
 *
 * @package    coothemes-icons/
 * @subpackage coothemes-icons/public
 *
 */

// Add [ctic-icons] Shortcode
function generate_ctic_icon( $atts ) {

	// Extract our shortcode attributes
	extract( shortcode_atts(
		array(
			'icon' => '',
			'wrap' => '',
			'class' => '',
			'size' => '',
			'custom_icon' => '',
			'link' => '',
			'new_tab' => '',
			'color' => '',
			'is' => '',
		), $atts )
	);

	// if icon and custom icon is left blank
	if( !isset( $icon ) || empty( $icon ) ) {
		if( !isset( $custom_icon ) || empty( $custom_icon ) ) {
			return __( 'Whoops! It looks like you forgot to specify an icon.' , 'coothemes-icons' );
		}
	}

	// if the user forgot to set a wrap
	if( !isset( $wrap ) || empty( $wrap ) ) {
		return __( 'Whoops! It looks like you forgot to specify your html tag.' , 'coothemes-icons' );
	}

	// if the user has set extra classes for the element
	if( !empty( $class ) ) {
		$classes = ' ' . esc_attr( $class );
	}

	// if the user has set a custom icon
	if( !empty( $custom_icon ) ) { // display a custom icon
		if($is == 1){
			$classes =  ' class="ctp ct-custom-' . trim( esc_attr( $custom_icon . ' ' . $class ) ) . '"';
		}else{
			
			$classes =  ' class="ct ct-custom-' . trim( esc_attr( $custom_icon . ' ' . $class ) ) . '"';			
		}
	} else { // display our default icon
		if($is == 1){
			$classes =  ' class="ctp ct-' . trim( esc_attr( $icon . ' ' . $class ) ) . '"';
		}else{
			
			$classes =  ' class="ct ct-' . trim( esc_attr( $icon . ' ' . $class ) ) . '"';			
		}	
		//$classes =  ' class="ct ct-' . trim( esc_attr( $icon . ' ' . $class ) ) . '"';
		
	}

	// create an array to populate with some styles
	$styles_array = array();

	// if the user has a set a custom icon size, set up our variable
	if( !empty( $size ) ) {
		$icon_size = 'font-size:' . esc_attr( $size ) . ';';
		$styles_array[0] = $icon_size;
	} else {
		$icon_size = '';
	}

	// if the user has a set a custom icon color, set up our variable
	if( !empty( $color ) ) {
		$icon_color = 'color:' . esc_attr( $color ) . ';';
		$styles_array[1] = $icon_color;
	} else {
		$icon_color = '';
	}

	// build up an array of styles,
	// to pass to our element
	if( !empty( $styles_array ) ) {
		$styles = 'style="' . esc_attr( implode( '' , $styles_array ) ) . '"';
	} else {
		$styles = '';
	}


	// check if this icon should be set as a link
	if( !empty( $link ) ) {
		// wrap our element in an anchor tag, for the link
		// don't forget to esc_url
		if( $new_tab == '1' ) {
			return '<a href="' . esc_url( $link ) . '" target="_blank"><' . esc_attr( $wrap ) . $classes . $styles . '></' . esc_attr( $wrap ) . '></a>';
		} else {
			return '<a href="' . esc_url( $link ) . '"><' . esc_attr( $wrap ) . $classes . $styles . '></' . esc_attr( $wrap ) . '></a>';
		}
	} else {
		// return the default icon
		return '<' . esc_attr( $wrap ) . $classes . $styles . '></' . esc_attr( $wrap ) . '>';
	}

}

// hook in and add our custom shortcode
add_shortcode( 'ctic-icons', 'generate_ctic_icon' );



?>
