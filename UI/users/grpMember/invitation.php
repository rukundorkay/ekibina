
  <!DOCTYPE html>
<html lang="en">
<head>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="../assets/css/loginstyle.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <?php
// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../includes/disableright.inc.php';

//add server side services
require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');
$id=$_SESSION[config::get("session/session_name")];
$token=$_SESSION[config::get("session/token_name")];
$invitation=unhash($_GET['requestedtracker']);
if(!$id){
  $invitation=actor($invitation);
  header("location:../../auth/?continue=https://localhost/ekibina/UI/users/grpMember/invitation?requestedtracker=$invitation");
}
unset($_SESSION['url']);
$associationdata=select('*','association',"groupToken='$invitation'");
foreach ($associationdata as $data){
  $associationid=$data['association_id'];
  $associationname=$data['association_name'];
  $startdate=$data['date_to_start'];
  $amount=$data['amount'];
  $description=$data['description'];
  $associationStatus=$data['status'];
  $currency=$data['currency_id'];
  $currency=select('symbol',"currency","currency_id='$currency'");
  foreach($currency as $symbol) $symbol=$symbol['symbol'];
}
$groupadmindata=select('*','member_association,user_member',"association_id='$associationid' and member_association.member_id = user_member.member_id and member_association.memberType_id=1 ");
  foreach($groupadmindata as $admin){
    $fname= $admin['first_name'];
    $lname=$admin['last_name'];
    $email=$admin['email'];
    $adminProfile=$admin['member_profile'];
    $adminId=$admin['member_id'];
    $memToken = $admin['token'];
  }
  $member= new member;
  $error="";$result=true;
  if ($associationStatus==0) $error="sorry this association has already started its operations";
  //check status of association if is actvated or deactivated
  if(isset($_POST['join'])){
  $result=$member->joinassociation($id,'0',$associationid,0);
  if(!$result){
  $error="Désolé, cette demande a déjà été envoyée";
  }else
  header("location:index");
  }
  if(isset($_POST['reject'])){
    header("location:../../auth/logout");
  }
?>

</head>



<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-10 mx-auto">

          <div class="row">


                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                    <p style="color:red;"> <?Php echo$error;?></p>

                                        <div class="card-body">
                                            <h4 class="card-title mb-0">Informations sur l'association</h4><br>
                                            <!--
                                            <img src="../images/faces/face5.jpg" class="img-lg rounded-circle mb-2" alt="profile image"/>
                                            -->
                                            <h4><?php echo $associationname; ?></h4>
                                            <h6><?php echo$description; ?></h6>
                                            <div class="border-top pt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Montant à payer</h6>
                                                        <p><?php echo$amount.$symbol;?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Date de début</h6>
                                                        <p><?php echo$startdate?></p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <form action="<?php echo $_SERVER['PHP_SELF']."?requestedtracker=".actor($invitation);?>" method="post">
                                              
                                                <div class="form-row">
                                                      <span style="padding-bottom: 5px"> <button name="join"class="btn btn-dark" data-toggle="modal" data-target="#profiledModal"<?php if(!$result||$associationStatus==0)echo "disabled"?>>Demander à rejoindre </button></span>   &nbsp;
                                                      <span style="padding-bottom: 5px"><button name="reject" class="btn btn-danger" data-toggle="modal" data-target="#profiledModal"> Rejeter l'invitation</button></span>  &nbsp;
                                                </div>
                                              
                                            </form>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>

                    <div class="col-lg-6 pl-lg-5">

                        <div class="d-flex justify-content-between">
                          <div>
                            <h4> <img src="../../assets/images/svg/mailing.svg" style="width:50px;"> Informations d'admin de l'association</h4>
                            <p>Vous pouvez contacter l'administrateur du groupe pour plus d'informations </p>
                          </div>
                        </div>

                        <div class="preview-list">
                            <div class="preview-item px-0">
                                <div class="preview-thumbnail">
                                  
                                   <?php
             if ($adminProfile == 'default_avatar.png') {

            ?>
              <img src="../member_pics/<?php echo $adminProfile; ?>" class="rounded-circle" alt="image" />


            <?php
            } else {
            ?>
             <img src="../member_pics/<?php echo $memToken . $adminProfile; ?>" class="rounded-circle" alt="profile image" />

            <?php } ?>
                                 
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <h5 class="preview-subject"><?php echo$fname."  ".$lname;?> 
                                        </h5>
                                        <p><?php echo $email;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                    <div class="mt-4 py-2 border-top border-bottom">
                        <ul class="nav profile-navbar">
                          <li class="nav-item">
                            <h6>
                                Contact
                            </h6>
                            <p>
                              +098 987 4986
                            </p>
                            <p class="small text-muted mt-2 mb-0">
                              <!--
                              <span>
                                <i class="fa fa-edit mr-1"></i>
                              </span>
                               -->
                            </p>
                          </li>
                        </ul>
                    </div>

                    </div>
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
   <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/misc.js"></script>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- Custom js for this page-->
  <script src="../assets/js/form-validation.js"></script>
  <script src="../assets/js/bt-maxLength.js"></script>
  <!-- End custom js for this page-->

  <!-- Custom js for this page-->
  <script src="../assets/js/formpickers.js"></script>
  <script src="../assets/js/form-addons.js"></script>
  <script src="../assets/js/x-editable.js"></script>
  <script src="../assets/js/dropify.js"></script>
  <script src="../assets/js/dropzone.js"></script>
  <script src="../assets/js/jquery-file-upload.js"></script>
  <script src="../assets/js/formpickers.js"></script>
  <script src="../assets/js/form-repeater.js"></script>
  <!-- End custom js for this page-->



  <?php

  //include_once '../includes/loginjs.inc.php';

  ?>

  <!-- END OF JS INCLUDES -->
</body>

</html>