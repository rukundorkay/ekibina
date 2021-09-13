<?php
// including the CSS STYLES


include_once '../includes/login.inc.php';

// disabling right click

include_once '../includes/disableright.inc.php';
//add server side services
require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');
$result="";
if(isset($_GET['continue'])){
  $_SESSION['url']= $_GET['continue'];
};

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $token=$_POST['token'];
  $member = new member();
  $result=$member->signin($email,$password,$token);
  if(isset($_SESSION['url'])) $invitation = $_SESSION['url'];
  //$invitation will hold session if session url is valid
 
  if($result){
    if(isset($invitation)){
      header("location:$invitation");
      //will direct user to join invitation page 
      }
      else 
      header("location:../users/grpMember");
      //will direct to index page  after login
    
  }
  $result="<div class='status-userNotCreated'>"."<center>"."<strong style='font-size:16px;color:white;font-style:italic;'>"."Il n'existe aucun compte valide avec l'email et le mot de passe saisis. "."</strong>"."</center>"."</div>";
}

?>


</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <div class="auth-form-light text-left p-5 rounded"  style="border-bottom:solid 7px #444;border-top:solid 7px #ffa200; ">
              <!-- <div class="brand-logo">
                <img src="../assets/images/logo.svg" alt="logo">
              </div> -->
              <h4>Login</h4>

              <h6 style="color:red;"><?php echo$result;?></h6>

              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
              <form class="pt-2" method="POST" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


                <div class="form-group">
                  <input type="email" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter your Email"name="email">
                </div>
                <div class="form-group">
                  <input type="password" require class="form-control form-control-lg" id="myInput" placeholder="Enter your password"name="password">
                  <input class="pb-3" type="checkbox" onclick="myFunction()" name="" id="">Show password
                  
                </div>
                <div class="form-group">
                  <input type="hidden" name="token" value="<?php echo crftoken();?>">
                </div>
                
                <div class="mt-3">
                  <button type="submit" style="background-color: #444;" class="btn btn-block font-weight-medium" name="login"  ><span style="color:#ffa200">S'identifier</span></button>
                </div>
                <div class="my-3 d-flex justify-content-between align-items-center">
                  <a href="resetPassEmail" class="auth-link text-black">Forgot your password?</a>
                </div>
                <div class="mt-3 font-weight-light">
                You do not have an account? <a href="register" class="text-primary">Sign up</a>
                </div>
                
                
                        <div class="template-demo mt-3">
                        <div class="" role="group" aria-label="Basic example">
                          <i class="fas fa-redo btn-icon-prepend"></i>
                          <a href="./../../index.html" class="btn btn-outline-warning btn-icon-text btn-block">Back to home</a>
                        </div>
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

<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5f7c9b124704467e89f52bac/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>

  <!-- END OF JS INCLUDES -->
  
</body>

</html>
