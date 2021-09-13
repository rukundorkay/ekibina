<?php
require 'vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
function createExpressAccount($country,$email){
$private_key= strval(config::get('stripe/private_key'));

// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey($private_key);
$account = \Stripe\Account::create([
  'country' => $country,
  'type' => 'express',
  'email' => $email,
  'business_type'=> 'individual',
  

]);

$acountid=$account['id'];
//print_r($account);
return $acountid;
}
?>