<?php
/*
Description: API Braintree Payment.
Author: Ziad Tamim
Version: 1.0
Author URI: https://intensifystudio.com
*/

require 'vendor/autoload.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('YOUR_MARCHANT_ID');
Braintree_Configuration::publicKey('YOU_PUBLIC_KEY');
Braintree_Configuration::privateKey('YOUR_PRIVATE_KEY');

// Get the credit card details submitted by the form
$paymentMethodNonce =  $_POST['payment_method_nonce'];
$amount = $_POST['amount'];

$result = Braintree_Transaction::sale([
  'amount' => $amount,
  'paymentMethodNonce' => $paymentMethodNonce,
  'options' => [
    'submitForSettlement' => True
  ]
]);

echo json_encode($result);
?>
