<!DOCTYPE html>

<html lang="en">

<head>



<?php

// including the CSS STYLES


require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server
include_once '../includes/login.inc.php';



// disabling right click



include_once '../includes/disableright.inc.php';

//add server side services

require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');

$domain=unhash($_GET['domain']);

$user=unhash($_GET['user']);

$email=$user."@".$domain;





?>



</head>



<body>



  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper">

      <div class="content-wrapper d-flex align-items-center auth">

        <div class="row w-100">

          <div class="col-lg-4 mx-auto">

            <div class="auth-form-light text-left p-5"  style="border-bottom:solid 7px #444;border-top:solid 7px #ffa200;">

              <!-- <div class="brand-logo">

                <img src="../assets/images/logo.svg" alt="logo">

              </div> -->

              <h4> Email envoyé</h4>

              

              <p>Vous recevrez l'e-mail contenant le lien pour réinitialiser votre mot de passe sur votre e-mail:&nbsp;&nbsp; <b><?php echo$email;?></b>

              </p>



              

              

            </div>

          </div>

        </div>

      </div>

      <!-- content-wrapper ends -->

    </div>

    <!-- page-body-wrapper ends -->

  </div>

  <!-- container-scroller -->



  <!-- JS INCLUDES -->

  <?php



  include_once '../includes/loginjs.inc.php';



  ?>



  <!-- END OF JS INCLUDES -->

</body>



</html>

