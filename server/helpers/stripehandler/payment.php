<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
require 'vendor/autoload.php';
function createIntent($amount,$maid,$currency,$country,$stripeid,$fees,$senderId){
  // Set your secret key. Remember to switch to your live secret key in production!
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  $private_key= strval(config::get('stripe/private_key'));
  //$amount will add amount use have to send to association member with  platform fees 
  \Stripe\Stripe::setApiKey($private_key);
  $amount=$amount+$fees;
  //if receiver country isn`t same as platform country
  if($country!=='united states'){
  $payment_intent = \Stripe\PaymentIntent::create([
    'amount' => $amount.'00',
    'currency' => $currency,
    'application_fee_amount' => $fees.'00',
    'payment_method_types' => ['card'],
    'on_behalf_of' =>$stripeid ,
    'transfer_data' => [
      'destination' => $stripeid,
    ],
  ]);}
  //else receiver country is same as platform country

  else{
    $payment_intent = \Stripe\PaymentIntent::create([
      'amount' => $amount.'00',
      'currency' => $currency,
      'application_fee_amount' => $fees.'00',
      'payment_method_types' => ['card'],
      'transfer_data' => [
        'destination' => $stripeid,
      ],
    ]);

  }
  $payment_intentId=$payment_intent['id'];
  $Today=date('Y-m-d h:i:s ');
  $data = ['stripe_paymentId' => $payment_intentId, 'amount' => $amount,'fees'=>$fees, 'ma_id' => $maid,'sender_id' => $senderId, 'date' => $Today, 'status' => '1',];

                  //$data array will store data to be inserted
                  $dataStructure = 'stripe_paymentId,amount,fees,ma_id,sender_id,date,status';
  
                  //$dataStructure will hold datastructure of table
                  $values =  ':stripe_paymentId,:amount,:fees,:ma_id,:sender_id,:date,:status';
  
                  insert('payment', $dataStructure, $values, $data);
  
  
  
  
  
  return $payment_intent;
  
  
  
  }

?>