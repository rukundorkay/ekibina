<!DOCTYPE html>

<html lang="en">

<head>



<?php

// including the CSS STYLES


//require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server
include_once '../includes/login.inc.php';



// disabling right click



include_once '../includes/disableright.inc.php';

//add server side services

require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');

$email=""; $error="";

if(isset($_POST['send'])){

  $email=$_POST['email'];

  $result=new member();

  $result=$result->resetpassword($email);

  if(!$result) $error="votre email n'est pas enregistré";

}



?>



</head>



<body>



  <div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper">

      <div class="content-wrapper d-flex align-items-center auth">

        <div class="row w-100">

          <div class="col-lg-4 mx-auto">

            <div class="auth-form-light text-left p-5 rounded"  style="border-bottom:solid 7px #444;border-top:solid 7px #ffa200;">

              <!-- <div class="brand-logo">

                <img src="../assets/images/logo.svg" alt="logo">

              </div> -->

              <h4>Account recovery</h4>

              <p style="color:red"><?php echo $error;?></p>

              <p>You will receive the email containing the link to reset your password</p>

              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->

              <form class="pt-2" method="POST" autocomplete="off" action="<?php echo$_SERVER['PHP_SELF'];?>">

                <div class="form-group">

                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter your Email" name="email" required>

                </div>

                <div class="mt-3">

                  <button type="submit" class="btn btn-dark btn-fw btn-block"name="send">Send</button>                
                </div>

                <div class="my-2 d-flex justify-content-between align-items-center">

                </div>

              </form>

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

