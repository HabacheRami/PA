<?php

// Product Details
// Minimum amount is $0.50 US
$productName = "Demo Product";
$productID = "DP12345";
$productPrice = 25;
$currency = "eur";

/*
 * Stripe API configuration
 * Remember to switch to your live publishable and secret key in production!
 * See your keys here: https://dashboard.stripe.com/account/apikeys
 */
define('STRIPE_API_KEY', 'sk_test_51KbqYGGvTIgukq07ZmGPnfHMl55latRhPKa9PPJyfqO8MTvicBnjAvYIrUUhCiLI8nQEF5d3yGYL97M5BUlsJZlp003pMlRsyn');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51KbqYGGvTIgukq07Hila4irQm3N5KGAOAPY9uwrYgInENG9zHZ0dG0tSHKHXXjL77CcKMoBcvVNUQ3l9TxZJMl8U007z8R9sLI');
define('STRIPE_SUCCESS_URL', 'http://localhost:8888/LoyaltyCard/CODE%20SOURCE/payment_success.php'); //Payment success URL
define('STRIPE_CANCEL_URL', 'http://localhost:8888/LoyaltyCard/CODE%20SOURCE/payment_cancel.php'); //Payment cancel URL

// Database configuration
define('DB_HOST', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'pa');

?>
