<!DOCTYPE html>

<html lang="en">

<head>

<title>Member | Association</title>

<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../includes/disableright.inc.php';
 // server services
include_once './memberpages/server.inc.php'; 

$maid=unhash($_GET['maid']);
@$positionStatus=unhash($_GET['status']);
@$myCurrentSatus=unhash($_GET['state']);
$data='ownedTour_date,phone_number,member_profile,groupToken,association.association_name,user_member.last_name,user_member.first_name,user_member.email,member_association.ma_id,member_association.status,member_association.ownedTour_number,user_member.token';

$memberdetails=select($data,'user_member,association,member_association',"user_member.member_id =member_association.member_id and  member_association.association_id = association.association_id and member_association.ma_id='$maid' ");
foreach($memberdetails as $member){
  $fName=$member['first_name'];
  $tokenmember=$member['token'];
  $lName=$member['last_name'];
  $maid=$member['ma_id'];
  $tourstatus=$member['status'];
  $email=$member['email'];
  $tour=$member['ownedTour_number'];
  $tourDate=$member['ownedTour_date'];
  $assname=$member['association_name'];
  $memberMage  = $member['member_profile'];
  $token=$member['groupToken'];
  $phoneNumber=$member['phone_number'];

}
$error="";
if(isset($_POST['claim'])){
  $result=new member();
  $result=$result->claim($id,$maid,$email,$assname,$fname,$lname,$fName,$lName,$token);
  if (!$result) $error="tu as déjà réclamé ";
}


?>


 
</head>


<body>


  <div class="container-scroller">


   <!-- start of navigation bar -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">

    <?php include_once './memberpages/navbar.inc.php';?>
  
    </nav>


    <!-- end of navbar -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    <!-- start of theme select section -->

    <?php //include_once './memberpages/theme.inc.php';?>


    <!-- end of theme select section -->

    <!-- start of SIDEBAR -->


    <div id="right-sidebar" class="settings-panel">


      <?php include_once './memberpages/sidebar.inc.php';
      ?>


    </div>


      <!-- END OF SIDEBAR -->


      <!-- start of left sidebar -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar">

      <?php include_once './memberpages/leftside.inc.php';?>
    
      </nav>


      <!-- end of left sidebar -->


      <!-- start of MAIN PANEL -->

      <div class="main-panel">


        <div class="content-wrapper">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="border-bottom text-center pb-4">       
                                <?php
            if ($memberMage == 'default_avatar.png') {

            ?>
              <img src="../member_pics/<?php echo $memberMage; ?>" class="img-lg rounded-circle mb-3" alt="image" />


            <?php
            } else {
            ?>
              <img src="../member_pics/<?php echo $tokenmember . $memberMage; ?>" class="img-lg rounded-circle mb-3" alt="image" />

            <?php } ?>
                    
                      </div>
                    </div>
                   
                    <div class="col-lg-8 pl-lg-5">
                      <div class="d-flex justify-content-between">
                        <div>
                        <p style ="color:red;"><?php echo$error;?></p>
                          <h4><?php echo$fName." ".$lName;?></h4>
                          <div class="d-flex align-items-center">
                            <h5 class="mb-0 mr-2 text-muted">
                            <i class="fas fa-users mr-1"></i><?php echo$assname;?></h5>
                          </div>
                        </div>
                      </div>
                      <div class="mt-4 py-2 border-top border-bottom">

                        <ul class="nav profile-navbar">
                          <li class="nav-item">
                            Position
                            <button type="button" class="btn btn-light btn-rounded btn-icon">
                            <?php if($tourstatus==1) echo"(none)";else echo$tour; ?> 
                         
                            </button><?php echo @$tourDate;?>
                          </li>
                        </ul>

                      </div>

                      <div class="profile-feed">

                        <div class="d-flex align-items-start profile-feed-item">
                          <div class="ml-4">
                            <h6>
                              Email
                            </h6>
                            <p>
                              <?php echo$email;?>
                            </p>
                            <p class="small text-muted mt-2 mb-0">
                              <!--
                              <span>
                                <i class="fa fa-edit mr-1"></i>
                              </span>
                               -->
                            </p>
                          </div>
                        </div>

                        <div class="d-flex align-items-start profile-feed-item">
                          <div class="ml-4">
                            <h6>
                              Contact 
                            </h6>
                            <p>
                              <?php echo $phoneNumber;?>
                            </p>
                            <p class="small text-muted mt-2 mb-0">
                              <!--
                              <span>
                                <i class="fa fa-edit mr-1"></i>
                              </span>
                               -->
                            </p>
                          </div>
                        </div>


                      </div>






                      <div class="profile-feed">

                        <form action="<?php echo $_SERVER['PHP_SELF']."?maid=".actor($maid);?>"method="post">
                        <div class="d-flex align-items-start profile-feed-item">
                          <input type="submit" value="Request for position"class="btn btn-dark" <?php if($tourstatus==1||!$positionStatus||!$myCurrentSatus) echo"disabled"; ?> name="claim"/>
                        </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- start of new members -->



        <!-- START OF MY ASSOCIATION HEADER ->
            <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5"><br><br>
                    <h3>Mes Associatiions</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!- END MY ASSOCIATION HEADER -->



          <div class="row">


          <?php // include_once './memberpages/newmember.inc.php';?>


                
          </div>




    <!-- end of new members -->

      <!-- END OF CARDS DASHBOARD -->

          <!-- start of charts 1 -->

          <?php //include_once './memberpages/charts1.inc.php';?>

 

          <!-- end charts 1 -->


          <!-- start of charts 2 -->

          <?php //include_once './memberpages/charts2.inc.php';?>


          <!-- end charts 2 -->


        </div>
        <!-- content-wrapper ends -->


        <!-- including footer -->
        <footer class="footer">

          <?php include_once './memberpages/footer.inc.php';?>
          
        </footer>

        <!-- end of footer section -->
   
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->




  <!-- including js files -->



  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- Custom js for this page-->
  <script src="../../assets/js/form-validation.js"></script>
  <script src="../../assets/js/bt-maxLength.js"></script>
  <!-- End custom js for this page-->

  <!-- Custom js for this page-->
  <script src="../../assets/js/formpickers.js"></script>
  <script src="../../assets/js/form-addons.js"></script>
  <script src="../../assets/js/x-editable.js"></script>
  <script src="../../assets/js/dropify.js"></script>
  <script src="../../assets/js/dropzone.js"></script>
  <script src="../../assets/js/jquery-file-upload.js"></script>
  <script src="../../assets/js/formpickers.js"></script>
  <script src="../../assets/js/form-repeater.js"></script>
  <!-- End custom js for this page-->




<?php // include_once './memberpages/js.inc.php'; ?>

  <!-- end of js files -->

</body>
</html>





