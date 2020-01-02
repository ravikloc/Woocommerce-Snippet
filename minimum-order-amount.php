<?php 
add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
function wc_minimum_order_amount() {
	global $woocommerce;
	$minimum = 50;
	if ( $woocommerce->cart->get_cart_total(); < $minimum ) {
           $woocommerce->add_error( sprintf( 'You must have an order with a minimum of %s to place your order.' , $minimum ) );
	}
}
?>
