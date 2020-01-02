<?php
/**
 * Split Cart
 *
 * Plugin Name: Split Cart 
 * Plugin URI:  https://www.kloctechnologies.com/
 * Description: Split cart items based on shipping class(Allow multiple shipping packages for one order based on shipping class)
 * Version:     1.0
 * Author:      KLoc Technologies Pvt. Ltd.
 * Author URI:  https://www.kloctechnologies.com/
 * License:     GPLv2 or later
 * License URI: https://www.kloctechnologies.com/
 * Text Domain: generatepress
 * Domain Path: /languages
 */

 

// Splitting Shipping Cost based on Shipping Class



add_filter( 'woocommerce_cart_shipping_packages', 'kloc_split_cart_by_shipping_class_group' );
function kloc_split_cart_by_shipping_class_group($packages){
    //Reset packages
    $packages               = array();
    
    //Init splitted package
    $splitted_packages      =   array();
    
    // Group of shipping class ids
    $class_groups =  array(
        'group1'    => array('free-shipping'),
        // 'group2'    =>  array('class-b'),
        // 'group3' =>  array(11,15,17),        
    );  
    
    foreach ( WC()->cart->get_cart() as $item_key => $item ) {
        if ( $item['data']->needs_shipping() ) {
            
            $belongs_to_class_group =   'none';
            
            $item_ship_class_id =   $item['data']->get_shipping_class();
            
            if($item_ship_class_id){
                
                foreach($class_groups as $class_group_key   =>  $class_group){
                    if(in_array($item_ship_class_id, $class_group)){                
                        $belongs_to_class_group = $class_group_key;
                        continue;
                    }
                }
                
            }           
            
            $splitted_packages[$belongs_to_class_group][$item_key]  =   $item;
        }
    }
    
    // Add grouped items as packages 
    if(is_array($splitted_packages)){
        
        foreach($splitted_packages as $splitted_package_items){
            $packages[] = array(
                'contents'        => $splitted_package_items,
                'contents_cost'   => array_sum( wp_list_pluck( $splitted_package_items, 'line_total' ) ),
                'applied_coupons' => WC()->cart->get_applied_coupons(),
                'user'            => array(
                     'ID' => get_current_user_id(),
                ),
                'destination'    => array(
                    'country'    => WC()->customer->get_shipping_country(),
                    'state'      => WC()->customer->get_shipping_state(),
                    'postcode'   => WC()->customer->get_shipping_postcode(),
                    'city'       => WC()->customer->get_shipping_city(),
                    'address'    => WC()->customer->get_shipping_address(),
                    'address_2'  => WC()->customer->get_shipping_address_2()
                )
            );
        }
    }
    return $packages;
}