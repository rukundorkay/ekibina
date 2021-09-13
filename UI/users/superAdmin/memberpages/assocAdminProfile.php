<!DOCTYPE html>
<!--
Template Name: Stack - Stack - Bootstrap 4 Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/ 
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/stack_admin
Renew Support: https://1.envato.market/stack_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template/page-users-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2020 15:35:55 GMT -->
<head>
<?php  // server services
	include_once 'includes/server.inc.php';
?>

    <title>Assoc Admin Profile</title>


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

       $adminId=unhash($_GET['admin']);
       #selection of admin info about him/herself
       $selectAdminINfo=select('*','user_member,country',"country.country_id=user_member.country_id and user_member.member_id = '$adminId'");
       foreach($selectAdminINfo as $adminInfo){
         $adminFname=$adminInfo['first_name'];
         $adminLname=$adminInfo['last_name'];
         $adminCountry=$adminInfo['country_name'];
         $adminDOB=$adminInfo['date_of_birth'];
         $adminRegistrationDate=$adminInfo['joinin_date'];
         $adminPhone=$adminInfo['phone_number'];
         $adminEmail=$adminInfo['email'];
         $adminStripeId=$adminInfo['stripe_id'];
         $memberImage=$adminInfo['member_profile'];
         $countrycode=$adminInfo['short_name'];
       }
       #selection of admin info about association
       $data="association.status,association_name,groupToken,memberType_id";
       $selectAdminInfoAssoc=select($data,'member_association,user_member,association,country',"member_association.member_id=user_member.member_id and member_association.association_id =association.association_id and country.country_id=user_member.country_id and user_member.member_id = '$adminId'");

    ?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- users view start -->

        
<section class="users-view">
  <!-- users view media object start -->
  <div class="row">
    <div class="col-12 col-sm-7">
      <div class="media mb-2">
        <a class="mr-1" href="#">
        <?php if ($memberImage == 'default_avatar.png') { ?>
          <img src="../../member_pics/<?php echo $memberImage; ?>" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
          <?php } else {
                        ?>
           <img src="../../member_pics/<?php echo $memToken . $memberImage; ?>" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
          <?php }?>
        </a>
        <div class="media-body pt-25">
          <h4 class="media-heading">
            <span class=""><?php echo $adminFname;?>  </span>
            <span class="font-medium-1 "><?php echo $adminLname;?></span>
          </h4>
          
          <span class=""><?php echo $adminCountry;?></span>
          <i class="flag-icon flag-icon-<?php echo strtolower($countrycode);?>"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-4">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  <td>Registered:</td>
                  <td><?php echo $adminRegistrationDate;?></td>
                </tr>
                <tr>
                  <td>stripe id:</td>
                  <td><?php echo $adminStripeId;?></td>
                </tr>
                <tr>
                  <td>Status:</td>
                  <td><span class="badge badge-success">Active</span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12 col-md-8">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th>Associations</th>
                    <th>Assocciation status</th>
                    <th>Role</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($selectAdminInfoAssoc as $adminInfoAssoc){
                  $associationName=$adminInfoAssoc['association_name'];
                  $associationMemberType=$adminInfoAssoc['memberType_id'];
                  $associationStatus=$adminInfoAssoc['status'];
                  $associationToken=actor($adminInfoAssoc['groupToken']);
                  ?>
                  <tr>
                    <td><a href="assocMemberships?token=<?php echo$associationToken;?>"><?php echo$associationName;?></a></td>
                    <td><?php if($associationStatus==0) echo "Active"; elseif($associationStatus==1) echo "pending";elseif ($associationStatus==2) echo "suspendend"; else echo"terminated"; 
                      # code...
                    ?></td>
                    <td><?php if($associationMemberType==1)echo"Admin";else echo"Member";}?></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- users view card data ends -->
  <!-- users view card details start -->
  <div class="card">
    <div class="card-content">
      <div class="card-body">

        <div class="col-12">
          <table class="table table-borderless">
            <tbody>
                <td>Name:</td>
                <td class="users-view-name"><?php echo $adminFname." ".$adminLname;?></td>
              </tr>
              <tr>
                <td>E-mail:</td>
                <td class="users-view-email"><?php echo $adminEmail;?></td>
              </tr>


            </tbody>
          </table>

          <h5 class="mb-1"><i class="feather icon-info"></i> Personal Info</h5>
          <table class="table table-borderless mb-0">
            <tbody>
              <tr>
                <td>Birthday:</td>
                <td><?php echo $adminDOB;?></td>
              </tr>
              <tr>
                <td>Country:</td>
                <td><?php echo $adminCountry;?></td>
              </tr>
              <tr>
                <td>Contact:</td>
                <td><?php echo $adminPhone;?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- users view card details ends -->

</section>
<!-- users view ends -->
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

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template/page-users-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2020 15:35:55 GMT -->
</html>







<!-- Compose Mail Modal -->
<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h4 class="modal-title" id="myModalLabel17">Compose Mail</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body">



    <form action="#" id="compose-form">
            <div class="card-content">
                <div class="card-body pt-0">
                    <div class="form-group pb-50">
                        <label for="emailfrom">from</label>
                        <input type="text" id="emailfrom" class="form-control" placeholder="user@example.com" disabled value="Just Between Us Team">
                    </div>
                    <div class="form-label-group mb-1">
                      <label for="emailfrom">To</label>
                      <input type="text" id="emailfrom" class="form-control" placeholder="user@example.com" disabled value="<?php echo $adminEmail;?>">
                    </div>

                    <div class="form-label-group mb-1">
                      <fieldset class="form-group">
                          <label for="descTextarea">Write a message</label>
                          <textarea class="form-control" id="descTextarea" rows="3"  placeholder="Textarea with description"></textarea>
                      </fieldset>
                    </div>
                </div>
            </div>
            <div class="card-footer border-0 d-flex justify-content-end pt-0">
                <button type="reset" class="btn btn-secondary cancel-btn mr-1">
                    <i class='feather icon-x mr-25'></i>
                    <span class="d-sm-inline d-none"  data-dismiss="modal">Cancel</span>
                </button>
                <button type="submit" class="btn-send btn btn-danger btn-glow">
                    <i class='feather icon-play mr-25'></i> <span class="d-sm-inline d-none">Send</span>
                </button>
            </div>
        </form>
        <!-- form start end-->


	  </div>
	</div>
  </div>
</div>