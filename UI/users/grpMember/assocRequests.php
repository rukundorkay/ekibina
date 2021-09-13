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

//selection for all association where i am admmin

$selectionAdmin=select("*","user_member,association,member_association"," user_member.member_id = member_association.member_id and association.association_id = member_association.association_id  and user_member.member_id ='$id' and member_association.memberType_id=1 and association.status='1' " );

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
                    <h3 class="d-none d-md-block">Association requests</h3>
                    <h4 class="d-block d-md-none">Association requests</h4>
                  
                    <p class="mb-md-0"><?php echo $numberOfRequest;?> Requests</p>
                    
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


            <?php // include_once './memberpages/singleAssocAccount.inc.php'; ?>


          </div>
          


          <div class="row">
          <div class="col-md-12 grid-margin grid-margin-md-0 ">

          <div class="card">
              <div class="card-body  border-bottom">
                <h4 class="card-title">List of members who have applied to join your association.</h4>

                <?php 
   foreach($selectionAdmin as $adminRow){
   $associationId=$adminRow['association_id'];
  //selection of request in each group
  $selectionRequest=select("*","user_member,association,member_association"," user_member.member_id = member_association.member_id and association.association_id = member_association.association_id  and association.association_id  ='$associationId' and member_association.status=0");

  foreach($selectionRequest as $request){
     $fname=$request['first_name'];
     $lname=$request['last_name'];
     $email=$request['email'];
     $assname=$request['association_name'];
     $requesterId=$request['ma_id'];
     $token=$request['groupToken'];
    $date=$request['date'];
     
     ?>
 



                  <div class="wrapper d-flex align-items-center py-2">

                    <!--  <img class="img-sm rounded-circle d-none d-md-block" src="../../assets/images/faces/face16.jpg" alt="profile">-->

                      <div class="wrapper ml-3" style=" width: 250px;">
                          <h6 class="mb-1"><?php echo$fname." ".$lname;?></h6>
                          <small class="text-muted mb-0"></i><?php echo$email;?></small>
                      </div>

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px; width: 200px;">
                          <h6 class="mb-1">Location & date</h6>
                          <small class="text-muted mb-0"><i class="fas fa-map-marker-alt mr-1"></i>Rwanda</small>
                          <small class="text-muted mb-0"><i class="fas fa-clock mr-1"></i><?php echo $date;?></small>
                      </div>

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px;">
                          <h6 class="mb-1">Group</h6>
                          <small class="text-muted mb-0"><i class="fas fa-angle-right mr-1"></i><?php echo$assname;?></small>
                      </div>

                      <div class="badge badge-pillb ml-auto px-1 py-1 d-none d-sm-block" style="text-decoration: none; color: dodgerblue;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="acceptJoin?mid=<?php echo actor($requesterId);?>&&token=<?php echo actor($token);?>" class="btn btn-warning" title="Confirm this request, You can not redo this action">
                            <i class="fa fa-check" style="color: white;"></i>
                          </a>
                          <a href="rejectJoin?maid=<?php echo actor($requesterId);?>&&token=<?php echo actor($token)?>" class="btn btn-danger" title="I don't want to confirm this request, You can not redo this action">
                            <i class="far fa-times-circle"></i>
                          </a>
                        </div>
                      </div>

                  </div>


                        <div class="btn-group d-block d-sm-none pl-3" role="group" aria-label="Basic example">
                          <a href="acceptJoin?mid=<?php echo actor($requesterId);?>&&token=<?php echo actor($token);?>" class="btn btn-warning" title="Confirm this request, You can not redo this action">
                            <i class="fa fa-check" style="color: white;"></i>
                          </a>
                          <a href="rejectJoin?maid=<?php echo actor($requesterId);?>&&token=<?php echo actor($token)?>" class="btn btn-danger" title="I don't want to confirm this request, You can not redo this action">
                            <i class="far fa-times-circle"></i>
                          </a>
                        </div>
            
                      <hr class="">
            
            
            
            
                  <?php  }}?>
                  <?php
                  if ($numberOfRequest == 0) {
                  ?>

                    <div class="col-md-12 grid-margin">
                      <div class="card card-inverse-danger" id="context-menu-access">
                        <div class="card-body">
                          <h4 class="card-text">
                            Aucune demande d'association trouvée
                          </h4>
                        </div>
                      </div>
                    </div>



                  <?php } ?>


                      




                  
                  
            </div>
          </div>
          </div>




          <!--LIST OF ASSOCIATION MEMBERS
          <div class="card" id="cardingtable">
            <div class="card-body">
              <h4 class="card-title">List Of Association Members</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-striped">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th >Member Names</th>
                            <th class="">Country</th>
                            <th>Status</th>
                            <th class="">Contact</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td ><i class="far fa-check-circle btn-icon-prepend" style="color: green;"></i> Ivan Ishimwe</td>
                            <td class="">Rwanda</td>
                            <td>
                              <label class="badge badge-warning">
                                <i class="far fa-check-square btn-icon-prepend"></i>
                                Paid
                              </label>
                            </td>
                            <td class="">
                              +250 788 887 7777 (Burundi)
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                            <i class="fa fa-spinner btn-icon-prepend"></i>
                             Jaures Habineza</td>
                            <td class="">USA</td>
                            <td>
                              <label class="badge badge-danger">
                                <i class="fa fa-exclamation-triangle btn-icon-prepend"></i>
                                Not paid
                              </label>
                            </td>
                            <td class="">
                              +250 788 887 7777 (Rwanda)                           
                            </td>
                        </tr>
                        

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          END LIST OF ASSOCIATION MEMBERS
          -->



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


