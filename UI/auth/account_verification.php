<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../assets/css/register/acc_verification.css" media="all" rel="stylesheet" type="text/css" />
  <title>Account verification</title>
  <style>
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../assets/images/gif/DemandingElectricCranefly-small.gif') 50% 50%  no-repeat rgba(255,255,255,1);
    opacity: .9;
}
</style>
  <?php
include_once '../includes/seopt.inc.php';
include_once '../includes/disableright.inc.php';

//including backend services

require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');

$error="";
$email=unhash($_GET['state'])."@".unhash($_GET['data']);
$country=unhash($_GET['nextdata']);

if(isset($_POST['verify'])){
    //GATHERING FIELDS

    $f1 = escape($_POST['field_1']);
    $f2 = escape($_POST['field_2']);
    $f3 = escape($_POST['field_3']);
    $f4 = escape($_POST['field_4']);
    $f5 = escape($_POST['field_5']);
    $f6 = escape($_POST['field_6']);

    $token = $f1.$f2.$f3.$f4.$f5.$f6;
    $result= new member();
    $result= new member();
    $result=$result->verifyEmail($token,$email,$country);
    if($result) header("location:last_step");
    else $error="<div class='status-userNotCreated'>"."<center>"."<strong style='font-size:16px;color:white;font-style:italic;'>"."The verification code you entered is incorrect."."</strong>"."</center>"."</div>";
    //message to be displayed for wrong token
}
?>
</head>

<body>
  <div class="loader"></div>
  <div class="container">
    <h2 class="info">Check your email!</h2>
    <p>We have sent the 6 number confirmation code to your email..<br> Check your email address and
       insert it here to verify your account</p>
     <P><?php echo $error; ?></P>
    <div class="code-container">
    <form action="<?php echo $_SERVER["PHP_SELF"]."?data=".$_GET['data']."&&state=".$_GET['state']."&&nextdata=".$_GET['nextdata'];?>"  method="post" autocomplete="off">
      <input type="number" name="field_1" class="code" min="0" max="9" required>
      <input type="number" name="field_2" class="code" min="0" max="9" required>
      <input type="number" name="field_3" class="code" min="0" max="9" required>
      <input type="number" name="field_4" class="code" min="0" max="9" required>
      <input type="number" name="field_5" class="code" min="0" max="9" required>
      <input type="number" name="field_6" class="code" min="0" max="9" required>
      <input type="submit" value="Vérifier le compte" class="btn-submit" name="verify">
    </form>
    </div>
 
  </div>
  <script src="verification.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut(12000);
});
</script>
</body>

</html>