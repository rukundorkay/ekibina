<!DOCTYPE html>

<html lang="en">

<head>

  <title>Member | Association | Profile</title>

  <?php

  // including the CSS STYLES

  include_once './memberpages/cssstyles.inc.php';

  // disabling right click

  include_once '../../includes/disableright.inc.php';
  // server services
  include_once './memberpages/server.inc.php';
  // UPDATE MEMBER DATA
  include_once './memberpages/upload_profile.inc.php';

  // lines corrected by Ivan
  if (isset($_POST['changepass'])) {
    $newpassword = $_POST['newpass'];
    $confirmpassword = $_POST['confirmpass'];
    if ($newpassword == $confirmpassword) changepassword($newpassword, $id);
  }

  ?>
</head>


<body>


  <div class="container-scroller">


    <!-- start of navigation bar -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">

      <?php include_once './memberpages/navbar.inc.php'; ?>

    </nav>


    <!-- end of navbar -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- start of theme select section -->

      <?php //include_once './memberpages/theme.inc.php';
      ?>


      <!-- end of theme select section -->

      <!-- start of SIDEBAR -->


      <div id="right-sidebar" class="settings-panel">


        <?php include_once './memberpages/sidebar.inc.php'; ?>


      </div>


      <!-- END OF SIDEBAR -->


      <!-- start of left sidebar -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar">

        <?php include_once './memberpages/leftside.inc.php'; ?>

      </nav>


      <!-- end of left sidebar -->


      <!-- start of MAIN PANEL -->

      <div class="main-panel">


        <div class="content-wrapper">


          <div class="page-header">
            <h3 class="page-title">
            My Account Settings
            </h3>

            <?php // echo @$successMsg; ?>
            <!--
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Sample Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
              </ol>
            </nav>
          -->
          </div>
          
          
          
           <!-- MESSAGE -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="mr-md-3 mr-xl-12">
                <p class="mb-md-0" style="font-size: 16px;"> <?php echo  @$successMsg;?></p>
              </div>
            </div>
          </div>
          



          <!-- PROFILE PIC MODAL -->
          <div class="modal fade" id="profiledModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel-2">Update your profile picture</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title d-flex">Drag and drop your image or click here
                              <!--
                                      <small class="ml-auto align-self-end">
                                        <a href="dropify.html" class="font-weight-light" target="_blank">More dropify examples</a>
                                      </small>
                                      -->
                            </h4>

                            <input type="file" data-max-file-size="30kb" accept="image/x-png,image/jpeg,image/jpg,image/ico" name="upload_profil" class="dropify" />

                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-dark" name="upload_image">Upload</button>
                    </div>
                  </div>
                </form>

                <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        </div> -->
              </div>
            </div>
          </div>
          <!-- END PROFILE PIC -->


          <div class="row">
            <div class="col-lg-12">
              <div class="card" style="border-radius:0px;border-top:4px solid #444;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">

                      <div class="border-bottom text-center pb-4">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h3><?php echo $fname . " " . $lname; ?></h3>
                            <div class="d-flex align-items-center">
                              <h5 class="mb-0 mr-2 text-muted"><?php echo $countryName;?></h5>
                            </div>
                          </div>
                        </div>

                        <?php if ($memberImage == 'default_avatar.png') { ?>

                          <img src="../member_pics/<?php echo $memberImage; ?>" alt="profile" style="border:5px solid #f4f4f4;border-spacing:2px;box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.3);width: 200px;height: 200px;overflow: hidden;" class="img-lg rounded-circle mb-3" />

                        <?php } else {
                        ?>

                          <img src="../member_pics/<?php echo $memToken . $memberImage; ?>" alt="profile" style="border:5px solid #f4f4f4;border-spacing:2px;box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.3);width: 200px;height: 200px;overflow: hidden;" class="img-lg rounded-circle mb-3" />

                        <?php } ?>
                        <!--
                        <p>Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design. </p>
                        -->
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#profiledModal"><i class="fa fa-file-upload"></i> Upload profile</button>
                          &nbsp;

                          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
                          <!--
                            <button type="submit" name="saveUserData" class="btn btn-dark"> <i class="fa fa-edit"></i> Update Info</button>
                            -->


                        </div>


                      </div>



                    </div>






                    <div class="col-lg-8 pl-lg-5">

                      <div class="card-body">
                        <div class="form-group">
                          <div class="mt-4 py-2 border-top border-bottom">
                      
                            <ul class="nav profile-navbar">
                              <li class="nav-item">
                                <a class="nav-link active" href="#">
                                 <img src="../../assets/images/svg/login.svg" style="width: 50px;" alt="">
                                 Account Info
                                </a>
                              </li> 
                              <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#passwordModal">
                                <img src="../../assets/images/svg/password.svg" style="width: 50px;" alt="">
                                Change Password
                                </a>
                              </li>
                            </ul>
                      
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-2">
                            <div id="the-basics">
                            <img src="../../assets/images/svg/name.svg" style="width: 50px;" alt="">
                            </div>
                          </div>
                          <div class="col-md-5">
                            <label>First name</label>
                            <div id="the-basics">
                            <input type="text" name="prenome" class="form-control" value="<?php echo $fname;?>" id="">
                            </div>
                          </div>
                          <div class="col-md-5">
                            <label>Last name</label>
                            <div id="bloodhound">
                            <input type="text" name="firstprenom" class="form-control" value="<?php echo $lname;?>" id="">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-2">
                            <div id="the-basics">
                            <img src="../../assets/images/svg/mail.svg" style="width: 50px;" alt="">
                            </div>
                          </div>
                          <div class="col-md-10">
                            <label> E-mail adress</label>
                            <div id="bloodhound">
                            <input type="email" name="email_prenom" class="form-control" disabled value="<?php echo $memberEmailAddress;?>" id="">
                            </div>
                          </div>
                        </div>
                        <button type="submit" name="saveUserData" class="btn btn-dark" title="If you click here, you agree that the information in the input fields above is your profile information"> <i class="fa fa-edit"></i>Click to update</button>
                      </div>
                      
                      <div class="profile-feed">
                      
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


            <?php // include_once './memberpages/newmember.inc.php';
            ?>



          </div>




          <!-- end of new members -->

          <!-- END OF CARDS DASHBOARD -->

          <!-- start of charts 1 -->

          <?php //include_once './memberpages/charts1.inc.php';
          ?>



          <!-- end charts 1 -->


          <!-- start of charts 2 -->

          <?php //include_once './memberpages/charts2.inc.php';
          ?>


          <!-- end charts 2 -->


        </div>
        <!-- content-wrapper ends -->


        <!-- including footer -->
        <footer class="footer">

          <?php include_once './memberpages/footer.inc.php'; ?>

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

  <!-- end of js files -->

</body>

</html>

<!-- PASSWORD MODAL -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-2"><img src="../../assets/images/svg/password1.svg" style="width: 50px;" alt=""> Change your password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-lg-12">

            <div class="card-body">

              <form class="cmxform" method="POST" action="">
                <fieldset>
                  <div class="form-group">
                    <label for="password">Current Password</label>
                    <input id="password" class="form-control" name="oldpassword" placeholder="*******" type="password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">New Password</label>
                    <input id="confirm_password" class="form-control" name="confirm_password" placeholder="*******" type="password">
                  </div>
                  <input class="btn btn-dark" type="submit" name="change_pass" value="Change Password">
                  <input class="btn btn-danger" type="reset" data-dismiss="modal" name="change_pass" value="Annuler">
                </fieldset>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END PASSWORD MODAL -->