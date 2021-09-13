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

$token=$_GET['token'];

$error="";

if(isset($_POST['submit'])){

 $pass=$_POST['password'];

  $confirm=$_POST['confirm_password'];

  if($pass!==$confirm) $error="password mismatch";

  else{

   $result=new member();

   $result=$result->newpassword($pass,$token);

   if(!$result) $error="token expired";

   else header("location:index");



    



  }



}



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

              <h4>New Password</h4>

              <p style="color:red;"><?php echo$error;?></p>



                <form class="cmxform" id="signupForm" method="post" action="<?php echo$_SERVER["PHP_SELF"]."?token=".$token;?>">

                    <fieldset>

                      <div class="form-group">

                        <label for="password">Password</label>

                        <input id="password" class="form-control" name="password" type="password">

                      </div>

                      <div class="form-group">

                        <label for="confirm_password">Confirm password</label>

                        <input id="confirm_password" class="form-control" name="confirm_password" type="password">

                      </div>

                      <input class="btn btn-dark btn-fw btn-block" type="submit" value="Submit"name="submit">

                    </fieldset>

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



  



  <!-- plugins:js -->

  <!---<script src="../assets/vendors/js/vendor.bundle.base.js"></script>

  <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>

   endinject 

Custom js for this page

  <script src="../assets/js/form-validation.js"></script>

  <script src="../assets/js/bt-maxLength.js"></script>

  End custom js for this page-->







  <?php



  //include_once '../includes/loginjs.inc.php';



  ?>



  <!-- END OF JS INCLUDES -->

</body>



</html>

