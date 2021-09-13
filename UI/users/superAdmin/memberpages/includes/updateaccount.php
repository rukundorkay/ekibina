<?php
// uploading the image
if (isset($_POST['upload_image_admin'])) {
  # code...
  $sqlUpdate    = "UPDATE admin  SET admin_profile=:profiling WHERE admin_id=:userId";
  $folder ="../../member_pics/superadmins/";
  $prod_profile =$_FILES['upload_profil']['name'];
  $path = $folder . $prod_profile ;
  move_uploaded_file($_FILES['upload_profil']['tmp_name'], $path);
  $statement    = $GLOBALS['dbConnection']->prepare($sqlUpdate);
  $statement->execute([':userId'=>$adminId,'profiling'=>$prod_profile]);
  header("location:superAdminProfile");
}
// UPDATING USER INFO
if (isset($_POST['dataupdate'])) {
  # code...
  $firstName     = escape($_POST['firste']);
  $lastName      = escape($_POST['laste']);
  $emailAdd      = escape($_POST['maile']);
  $sqlUpdateuser = "UPDATE admin SET first_name=:userfirst,last_name=:userlast,email=:useremail WHERE admin_id=:userId";
  $statement1  = $GLOBALS['dbConnection']->prepare($sqlUpdateuser);
  if (empty($firstName) || empty($lastName) || empty($emailAdd)) {
    # code...
    echo "<script>alert('Errror: Some Fields Are empty , check your form');</script>";

  }
  else {

  $statement1->execute(['userId'=>$adminId,'userfirst'=>$firstName,'userlast'=>$lastName,'useremail'=>$emailAdd]);
  echo "<script>alert('Success: Account Updated Successfuly');</script>";
  }
}