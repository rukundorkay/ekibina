<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server

require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';

$private_key= strval(config::get('stripe/private_key'));

\Stripe\Stripe::setApiKey($private_key);

$account = \Stripe\Account::create([

    'country' => 'US',

    'type' => 'express',

  ]);?>