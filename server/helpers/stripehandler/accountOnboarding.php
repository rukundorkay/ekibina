<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
require 'vendor/autoload.php';
function createAccountLink($stripeAcc){
    $private_key= strval(config::get('stripe/private_key'));

// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey($private_key);
$account_links = \Stripe\AccountLink::create([
  'account' =>$stripeAcc,
  'refresh_url' => 'https://localhost/ekibina/UI/users/grpMember/index',
  'return_url' => 'https://localhost/ekibina/UI/users/grpMember/acceptOnboarding',
  'type' => 'account_onboarding',
]);
$url=$account_links['url'];

return $url;
}
?>