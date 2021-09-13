<?php
// server services
include_once 'includes/server.inc.php';
// update account page
include_once 'includes/updateaccount.php';
?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template/page-users-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2020 15:35:55 GMT -->
<head>
    <title>JBU - Super Admin profile</title>

    <!-- BEGIN: css.include-->
    <?php
    include_once 'includes/css.inc.php';
    ?>
    <!-- END: css.include-->


  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="horizontal-layout horizontal-menu horizontal-menu-padding 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php
    // including navbar
       include_once 'includes/navBar.php';
    ?>
    <!-- END: Header-->



    <!-- BEGIN: Main Menu-->
    <?php
    // including navbar
       include_once 'includes/menuBar.php';
    ?>
    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                                        href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                                        href="#information" aria-controls="information" role="tab" aria-selected="false">
                                        <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                                    </a>
                                </li> -->
                            </ul>



                            <div class="tab-content">
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <?php if ($adminprofile == 'default_avatar.png') { ?>
                                            <a class="mr-2" href="#">
                                               <img src="../../member_pics/default_avatar.png" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                            </a>
                                            <?php } else {?>
                                               <a class="mr-2" href="#">
                                               <img src="../../member_pics/superadmins/<?php echo $adminprofile; ?>" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                                            </a>
                                        <?php }?>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $firstName . " " . $lastName; ?></h4>
                                            <div class="col-12 px-0 d-flex">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                   <button class="btn btn-dark mr-25" name="upload_image_admin" type="submit">Update Profile</button>
                                                   <input type="file" name="upload_profil" required>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->

                                    <form  method="POST" autocomplete="off" novalidate>
                                        <?php echo @$errorMsg; ?>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="firste" value="<?php echo $firstName; ?>" required  data-validation-required-message="This name field is required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control"name="laste" value="<?php echo $lastName; ?>" required  data-validation-required-message="This name field is required">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <label>Management Level</label>
                                                    <select class="form-control">
                                                        <option>Super Admin</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control" name="maile" placeholder="Email" value="<?php echo $adminMail; ?>"  required data-validation-required-message="This email field is required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                               <button type="submit" name="dataupdate" class="btn btn-dark glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update Data</button>
                                               <button type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>

                                    </form>
                                
                                    <!-- users edit account form ends -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <?php
       // including Customizer
       //include_once 'includes/Customizer.php';
    ?>
    <!-- END: Customizer-->


    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light ">
    <?php
    // including footer
       include_once 'includes/footer.php';
    ?>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: css.include-->
    <?php
       include_once 'includes/js.inc.php';
    ?>
    <!-- END: css.include-->

  </body>
  <!-- END: Body-->

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template/page-users-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2020 15:35:56 GMT -->
</html>