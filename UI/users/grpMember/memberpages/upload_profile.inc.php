<?php
// uploading the image
if (isset($_POST['upload_image'])) {
  # code...
  $sqlUpdate    = "UPDATE user_member  SET member_profile=:profiling WHERE member_id=:userId";
  $folder ="../member_pics/";
  $prod_profile =$_FILES['upload_profil']['name'];
  $path = $folder . $memToken.$prod_profile ;
  move_uploaded_file($_FILES['upload_profil']['tmp_name'], $path);
  $statement    = $GLOBALS['dbConnection']->prepare($sqlUpdate);
  $statement->execute([':userId'=>$memberId,'profiling'=>$prod_profile]);
  header("location:memberProfile");
  $successMsg = "<div class='card card-inverse-success' id='context-menu-access'>"."<div class='card-body'>"."<p class='card-text'>"."<strong>"."Profile Picture Has Been Updated"."</strong>"."</p>"."</div>"."</div>";
}
// UPDATING USER INFO
if (isset($_POST['saveUserData'])) {
  # code...
  $firstName     = escape($_POST['prenome']);
  $lastName      = escape($_POST['firstprenom']);
  $emailAdd      = escape($_POST['email_prenom']);
  $sqlUpdateuser = "UPDATE user_member SET first_name=:userfirst,last_name=:userlast,email=:useremail WHERE member_id=:userId";
  $statement1  = $GLOBALS['dbConnection']->prepare($sqlUpdateuser);
  if (empty($firstName) || empty($lastName) || empty($emailAdd)) {
    # code...
    $errorMsg = "<div class='card card-inverse-danger' id='context-menu-access'>"."<div class='card-body'>"."<p class='card-text'>"."<strong>"."Please Check Your Fields"."</strong>"."</p>"."</div>"."</div>";

  }
  else {

  
  $statement1->execute(['userId'=>$memberId,'userfirst'=>$firstName,'userlast'=>$lastName,'useremail'=>$emailAdd]);
  $successMsg = "<div class='alert alert-success' role='alert' id='context-menu-access'>"."Le profil a été mis à jour "."</div>";
  }
}