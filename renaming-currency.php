// Renaming Currency

add_filter('woocommerce_currency_symbol', 'hawkdive_currency_symbol', 10, 2);
function hawkdive_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'SGD': $currency_symbol = 'SGD '; break;
          case 'AUD': $currency_symbol = 'AUD '; break;
          case 'CAD': $currency_symbol = 'CAD '; break;
          case 'GBP': $currency_symbol = 'GBP '; break;
          case 'EUR': $currency_symbol = 'EUR '; break;
     }
     return $currency_symbol;
}
