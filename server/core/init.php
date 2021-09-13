<?php

$GLOBALS['config'] = array(
    'mysql' => array(
                'host'=>'localhost',
                'username'=>'root',
                'password'=>'',
                'db'=>'ekibina'
    ),
    'remember'=>array(
                'cookie_name'=> 'hash',
                'cookie_expriry'=>'604800'
    ),
    'session'=>array(
           'session_name'=>'member',
           'token_name'=>'token'
           
    ),
    'stripe'=>array(
        'private_key'=>'sk_test_51HAxyeJoHpIDTE07sAK4LIXxZbPUsL4RkhhdPPUlRV7S2VpGx0gCzKO5ltDPXKGljMwt7uvTSU4PELEmdh7j1y0b00uMXPOGK9',
        'public_key'=>'pk_test_51HAxyeJoHpIDTE07AHYb4UArtbPvt7fIKxane0s2VyP7WboBYi8ttdb5IVnynBLPYULRLjRXEPlgfGeL7kwvi7mH00LFxd2mu2'
    )
    );
  
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/config/config.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/db/db.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/sqlQueries.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/sanitizer.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/tokenhandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/controllers/member.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/controllers/admin.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/controllers/association.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/validators/signupvalidator.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/validators/createassociationvalidator.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/validators/resetpasswordvalidator.php';
   //include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/test.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/hashinghandler.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/recaptchaV3.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/phpmailer/index.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/phpmailer/invitationMail.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/phpmailer/resetEmail.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/phpmailer/senderPaymentMail.php';
   include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/phpmailer/receiverPaymentMail.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/phpmailer/claimRequest.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/stripehandler/expressAccount.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/stripehandler/payment.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/stripehandler/accountOnboarding.php';

    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/sessionhandler.php';
        // hashing URLS ADDED BY IVAN
    include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/hashurls.hash.php';
   include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/middleware/successfulPayment.php';

?>