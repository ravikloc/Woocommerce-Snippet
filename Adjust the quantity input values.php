<?php
/**
 * Adjust the quantity input values
 */
add_filter( 'woocommerce_quantity_input_args', 'jk_woocommerce_quantity_input_args', 10, 2 ); // Simple products

function jk_woocommerce_quantity_input_args( $args, $product ) {
	if ( is_singular( 'product' ) ) {
		$args['input_value'] 	= 2;	// Starting value (we only want to affect product pages, not cart)
	}
	$args['max_value'] 	= 80; 	// Maximum value
	$args['min_value'] 	= 2;   	// Minimum value
	$args['step'] 		= 2;    // Quantity steps
	return $args;
}

add_filter( 'woocommerce_available_variation', 'jk_woocommerce_available_variation' ); // Variations

function jk_woocommerce_available_variation( $args ) {
	$args['max_qty'] = 80; 		// Maximum value (variations)
	$args['min_qty'] = 2;   	// Minimum value (variations)
	return $args;
}
?>
