<?php
//Remove PHP tags from start and end and then paste it into your theme functions.php

add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart_buy', 4 );
function woocommerce_simple_add_to_cart_buy(){
    global $product;
    $product_id=$product->id;
//   echo $product_id;
//   $price=$product->get_price_html();
//   echo $price;
if(has_term( 'clothing', 'product_cat' )){ // Add your own Product Category in which you want to show Buy Now Button
    echo '<a class="button" href="'.home_url('/checkout/?add-to-cart='.$product_id).'">';
    echo 'BUY NOW';
    echo '</a>';
}
else{
    echo "";
}
    
}
?>