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


      <?php include_once './memberpages/sidebar.inc.php';?>


    </div>


      <!-- END OF SIDEBAR -->


      <!-- start of left sidebar -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar">

      <?php include_once './memberpages/leftside.inc.php';?>
    
      </nav>


      <!-- end of left sidebar -->


      <!-- start of MAIN PANEL -->

      <dsiv class="main-panel">


        <div class="content-wrapper">


        <!-- START OF PAGE HEADER -->
            <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h3 class="d-none d-md-block">Mes Association</h3>
                    <h4 class="d-block d-md-none">Mes Association</h4>
                  </div>
                </div>
                <!--
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <a style="color: white;" class="btn btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#exampleModal-4">Invite people</a>
                </div>
                -->
              </div>
            </div>
          </div>
          <!-- end of page header -->



       <!-- START OF DASHBOARD CARDS -->

          <div class="row grid-margin">


            <?php // include_once './memberpages/singleAssocAccount.inc.php';?>


          </div>


          <div class="row">
          <div class="col-md-12 grid-margin grid-margin-md-0 ">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Associations</h4>
                <?php if($numberOfAssociation!= 0){
           //selection of user data
           foreach($associations as $association){
          $associationtoken=$association['groupToken'];
          $memberType=$association['memberType_id'];
          $numberofmemberofassociation= countAffectedRows('member_association,association',"member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 )and association.groupToken='$associationtoken'");?>

                <a href="<?php if($assocstatus == 2){?>errorsuspended<?php } else{?>singleAssoc?requestajaxhiddenId=<?php echo base64_encode(urlencode(md5($hashsalt))); ?>&&requesteddemo=<?php echo base64_encode(urlencode(($association['groupToken']))); ?>&&selectedproduct=<?php echo base64_encode(urlencode(md5($hashsalt2)));} ?>"style="text-decoration: none; color: black;">
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">
                     <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                        <i class="fas fa-users text-success"></i>                          
                      </button>
                      <div class="wrapper ml-3" style="border-left: 1px solid #ececea; padding-left: 10px; width: 300px;">
                          <h6 class="mb-1"><?php echo $association['association_name'];?></h6>
                          <small class="text-muted mb-0"><i class="fas fa-users mr-1"></i><?php echo$numberofmemberofassociation?>Members</small>
                          <small class="text-muted mb-0"><i class="fas fa-arrow-right mr-1"></i><?php if($memberType==1)echo"You: admin";else echo"You: member" ?></small>
                      </div>

                      <!--

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px;">
                          <h6 class="mb-1">Contact</h6>
                          <small class="text-muted mb-0"><i class="fas fa-phone mr-1"></i>	+250 788 887 7777</small>
                      </div>
                      -->

                      <div class="badge badge-pillb ml-auto px-1 py-1" style="text-decoration: none; color: dodgerblue;">
                        <i class="fa fa-angle-double-down font-weight-bold"></i>
                      </div>

                  </div>
                </a>
                <?php }}?>

                
                
                

            </div>
          </div>
          </div>




         



          <!-- start of new members -->





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

        <!-- end of footer section -->
   
      </div>
      <!-- main-panel ends -->

        <!-- including footer -->
        <footer class="footer">

          <?php include_once './memberpages/footer.inc.php';?>
          
        </footer>

    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../assets/js/form-validation.js"></script>
  <script src="../../assets/js/bt-maxLength.js"></script>
  <!-- End custom js for this page-->





  <!-- including js files -->

<?php include_once './memberpages/js.inc.php'; ?>

  <!-- end of js files -->




  

</body>
</html>


