<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
require '../../vendor/autoload.php';
require '../helpers/stripehandler/vendor/autoload.php';
$private_key= strval(config::get('stripe/private_key'));

//'sk_test_51HAxyeJoHpIDTE07sAK4LIXxZbPUsL4RkhhdPPUlRV7S2VpGx0gCzKO5ltDPXKGljMwt7uvTSU4PELEmdh7j1y0b00uMXPOGK9';
\Stripe\Stripe::setApiKey($private_key);

$app = new \Slim\App([
  'settings' => [
      'addContentLengthHeader' => false
  ]
]);
// Uncomment and replace with a real secret. You can find your endpoint's
// secret in your webhook settings.
$app->post('/webhook', function ($request, $response, $next) {
  $payload = $request->getBody();
  $sig_header = $request->getHeaderLine('stripe-signature');

  $event = null;
  $webhook_secret = 'whsec_yAcCsKXyQvIsi6Vm95fHCLxG0ovojM14';

  // Verify webhook signature and extract the event.
  // See https://stripe.com/docs/webhooks/signatures for more information.
  try {
    $event = \Stripe\Webhook::constructEvent(
      $payload, $sig_header, $webhook_secret
    );
  } catch(\UnexpectedValueException $e) {
    // Invalid payload.
    return $response->withStatus(400);
  } catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid Signature.
    return $response->withStatus(400);
  }

  if ($event->type == 'payment_intent.succeeded') {
    $paymentIntent = $event->data->object->id;
    handleSuccessfulPaymentIntent($paymentIntent);
  }

  return $response->withStatus(200);
});





$app->run();
?>