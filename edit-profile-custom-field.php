<?php
// add fields to edit address page
function woo_add_edit_address_fields( $fields ) {

	$new_fields = array(
				'date_of_birth'     => array(
				'label'             => __( 'Date of birth', 'woocommerce' ),
				'required'          => false,
				'class'             => array( 'form-row' ),
			),
		);
		
	$fields = array_merge( $fields, $new_fields );
	
    return $fields;
	
}

add_filter( 'woocommerce_default_address_fields', 'woo_add_edit_address_fields' );
?>
