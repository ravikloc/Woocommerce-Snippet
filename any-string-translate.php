<?php
add_filter( 'gettext', 'bbloomer_translate_woocommerce_strings', 999 );
 
function bbloomer_translate_woocommerce_strings( $translated ) {
 
// STRING 1
$translated = str_ireplace( 'Weight', 'Shipping Weight', $translated );
?>
