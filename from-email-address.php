<?php
function woo_custom_wp_mail_from() {
        global $woocommerce;
        return html_entity_decode( 'your@email.com' );
}
add_filter( 'wp_mail_from', 'woo_custom_wp_mail_from', 99 );
?>
