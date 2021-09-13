<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../includes/disableright.inc.php';
 // server services
include_once './memberpages/server.inc.php'; 
// GETTING ENNCRYPTED URL -> ADDED BY IVAN
@$token      = base64_decode(urldecode($_GET['requesteddemo']));
@$gettokenid = base64_decode(urldecode($_GET['ajaxidtokenizatoin']));
$infos = select('*', 'association,currency', "groupToken='$token'and currency.currency_id = association.currency_id");
foreach($infos as $info){
$associationName=$info['association_name'];
$description=$info['description'];
$date=$info['date_to_start'];
$associationId=$info['association_id'];
$associationStatus=$info['status'];
$symbol=$info['symbol'];
if($associationStatus == 2){
  header("location:errorsuspended");
}
//this will auto generate tour to each members when  its meet dayof starting
$Tour = new association();
if($date<=date('m/d/Y') && $associationStatus == 1){
$Tour->generate_tour($associationId);
$Tour->generate_date($associationId);
}
};

//$payControl will control pay now button 
$selectCurrentTour=select('current_tour','tour',"tour.association_id='$associationId'");
foreach($selectCurrentTour as $currentTour) $currentTour=$currentTour['current_tour'];
@$payControl=countAffectedRows('member_association',"member_association.member_id ='$id' and member_association.association_id='$associationId' and member_association.ownedTour_number='$currentTour'");
//$currentMember contain information of next member to receive money
@$selectCurrentMember=select('*','member_association,user_member'," member_association.association_id='$associationId' and member_association.ownedTour_number='$currentTour' and member_association.member_id=user_member.member_id");
foreach($selectCurrentMember as $currentMember){
  $currentMemberFirstname=$currentMember['first_name'];
  $currentMemberLastname=$currentMember['last_name'];
}
//$memberType will check the status of member in group either admin/ordinary member
$memberType=countAffectedRows('member_association',"member_association.association_id='$associationId' and member_association.member_id ='$id' and member_association.memberType_id='0' ");
$data='country_id,date,user_member.member_id,member_profile,user_member.last_name,user_member.first_name,user_member.email,member_association.ma_id,member_association.status,member_association.ownedTour_number,user_member.token';
$numberofmemberofassociation= countAffectedRows('member_association,association',"member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 ) and association.groupToken='$token'");
//selection of associationmate information
$membersofassociation=select($data,'member_association,association,user_member',"user_member.member_id =member_association.member_id and  member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 )and association.groupToken='$token' and member_association.member_id<>'$id'");
//selection of my information in association
$myinfoassociation=select($data,'member_association,association,user_member',"user_member.member_id =member_association.member_id and  member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 )and association.groupToken='$token' and member_association.member_id='$id'");

// FETCHING INFO
foreach ($myinfoassociation as $reposrAssoc) {
  $memberAssoc_id = $reposrAssoc['ma_id'];
  $men                        = $reposrAssoc['date'];
  $myTour=$reposrAssoc['ownedTour_number'];
  #disabling request button if i am next to receive
  if($myTour== @$currentTour || $myTour<@$currentTour) $myTourStatus=False;
  else $myTourStatus=True;
}

//calculate my contrubution
$selectContribution=select('SUM(amount) as sum','payment',"sender_id='$memberAssoc_id' and status = 0");
foreach($selectContribution as $contribution) $contributionAmount=$contribution['sum'];
$selectContribution=select('SUM(fees) as sum','payment',"sender_id='$memberAssoc_id' and status = 0");
foreach($selectContribution as $contribution) $contributionFees=$contribution['sum'];
$contribution=$contributionAmount-$contributionFees;


// reporting the association N.B: THIS REMAINS HERE
require_once './memberpages/reportGroup.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Association | <?php echo $associationName; ?></title>
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
                    <h3 class="d-none d-md-block">Association : <strong style="color: #e52d27;"><?php echo $associationName ?></strong></h3>
                    <h4 class="d-block d-md-none">Association : <strong style="color: #e52d27;"><?php echo $associationName ?></strong></h4>
                    <p class="mb-md-0" style="font-size: 16px;"> <?php echo $description ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  
                       <div class="form-row">
                          <span style="padding-bottom: 5px"><a href="payment?association=<?php echo actor($token)?>&&uinfo=<?php echo actor($memberAssoc_id)?>  &&tour=<?php echo actor($currentTour);?>" <?php if($associationStatus==1||$payControl==1||$contribution!==0) echo"visibility: hidden"; ?>   style="color: white;" class="btn btn-success mt-2 mt-xl-0" >Pay now</a></span>   &nbsp;
                          <span style="padding-bottom: 5px"><a style="color: white;" class="btn btn-danger mt-2 mt-xl-0" data-toggle="modal" data-target="#reportgroup"><i class="fa fa-question-circle"></i> Report Association </a></span>  &nbsp;
                          <span style="padding-bottom: 5px"><a style="color: white;"<?php if($memberType==1||$associationStatus==0) echo"visibility: hidden"; ?> class="btn btn-dark mt-2 mt-xl-0" data-toggle="modal" data-target="#exampleModal-4"><i class="fa fa-envelope"></i> Invite people</a></span>
                        </div>
      
                </div>
              </div>
            </div>
            
          </div>

          <?php  echo @$successMsg;?>
          <!-- end of page header -->



       <!-- START OF DASHBOARD CARDS -->

          <div class="row grid-margin">


            <?php include_once './memberpages/singleAssocAccount.inc.php';?>


          </div>
          <div class="row">
          <div class="col-md-12 grid-margin grid-margin-md-0 ">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Association members</h4>

                <?php if($numberofmemberofassociation>0){
                      foreach($membersofassociation as $member){
                        $date;
                        $tokenmember=$member['token'];
                        $fName=$member['first_name'];
                        $lName=$member['last_name'];
                        $maid=$member['ma_id'];
                        $memberId=$member['member_id'];
                        $tourstatus=$member['status'];
                        $email=$member['email'];
                        $tour=$member['ownedTour_number'];
                        $memberMage  = $member['member_profile'];
                        $country=$member['country_id'];
                        
                        $selectCountryData=select('*','country',"country_id='$country'");
                        foreach($selectCountryData as $countryData) $countryName=$countryData['country_name'];
                        if(@$currentTour>$tour){
                          $status=FALSE;
                        }
                          elseif (@$currentTour<$tour)
                          {
                            $status=TRUE;
                          }
                          elseif ($currentTour==$tour){ 
                          $status=FALSE;
                        }
                   ?>

                <a href="singleUserProfile?maid=<?php echo actor($maid); ?>&&status=<?php echo actor($status);?>&&state=<?php echo actor($myTourStatus)?>" style="text-decoration: none; color: black;">
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">
              <?php
            if ($memberMage == 'default_avatar.png') {

            ?>
              <img src="../member_pics/<?php echo $memberMage; ?>" class="img-sm rounded-circle" alt="image" />


            <?php
            } else {
            ?>
              <img src="../member_pics/<?php echo $tokenmember . $memberMage; ?>" class="img-sm rounded-circle" alt="image" />

            <?php } ?>
                      <div class="wrapper ml-3" style="border-left: 1px solid #ececea; padding-left: 10px; width: 300px;">
                          <h6 class="mb-1"><?php echo$fName." ".$lName;?></h6>
                          <small class="text-muted mb-0"><i class="<?php if($currentTour>$tour)echo
                          "fas fa-check-circle mr-1";elseif ($currentTour<$tour)echo"fas fa-spinner mr-1";
                          elseif ($currentTour==$tour) 
                          echo"fas fa-circle mr-1"?>"style="color: green;"></i>Position 
                          <?php if($tourstatus==1) echo"(not generated)";else echo$tour; ?> </small>
                          <small class="text-muted mb-0"><i class="fas fa-map-marker-alt mr-1"></i><?php echo$countryName;?> </small>
                      </div>

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px;">
                          <h6 class="mb-1">Contact</h6>
                          <small class="text-muted mb-0"><i class="fas fa-phone mr-1"></i><?php echo$email; ?></small>
                      </div>

                      <div class="badge badge-pillb ml-auto px-1 py-1" style="text-decoration: none; color: dodgerblue;">
                        <i class="fa fa-angle-double-down font-weight-bold"></i>
                      </div>

                  </div>
                </a><?php }} if($numberofmemberofassociation == 1){?>
                
                  <div class="col-md-12 grid-margin">
                    <div class='alert alert-danger' role='alert' id='context-menu-danger'>  <h5> There are no other members in this association</h5> </div>  
                        <!--
                        <div class="card card-inverse-danger" id="context-menu-access">
                          <div class="card-body">
                                 <h5 class="card-text"> <div class='alert alert-success' role='alert' id='context-menu-danger'> Il n'y a pas d'autres membres dans cette association </div>  </h5>
                          </div>
                        </div>
                         -->
                </div><?php }?>

               
            </div>
          </div>
          </div>



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


<div class="modal fade " id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Inviter de nouveaux membres à <?php echo $associationName; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

          <p>Copiez le lien ci-dessous et envoyez-le aux personnes que vous souhaitez inviter.</p>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <!--
                      <h4 class="card-title">clipboard on text input</h4>
                      <p class="card-description">Cut/copy from text input</p>
                      -->
                      <input type="text" id="clipboardExample1" class="form-control" value="https://localhost/ekibina/UI/users/grpMember/invitation?urlencryptp2p=<?php echo base64_encode(urlencode(md5($hashsalt2))); ?>&&requestedtracker=<?php echo base64_encode(urlencode(($token))); ?> ">                  
                          <div class="mt-3">
                        <button type="button" class="btn btn-warning btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample1"><i class="fa fa-link"></i> Copier le lien</button>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>Saisissez l'adresse e-mail des personnes que vous souhaitez inviter.</p>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                  <form method="post">
                    <div class="card-body">
                    <!--
                      <h4 class="card-title">clipboard on text input</h4>
                      <p class="card-description">Cut/copy from text input</p>-->
                      <input type="email" id="clipboardExample1" class="form-control" value="" placeholder="Enter email" name="email"multiple>
                      <div class="mt-3">
                        <button type="submit" name="sendInvitation" class="btn btn-info btn-clipboard"><i class="fa fa-send"></i>Envoyer Invitation</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
  
  <!-- report association modal -->

<div class="modal fade " id="reportgroup" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel"><img src="../../assets/images/svg/error.svg" style="width: 40px;" alt=""> Report Association " <?php echo $associationName; ?> "</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-12 grid-margin">

              <div class="form-group">

                <select name="assoc_reason" required class="form-control" id="">
                  <option selected disabled>Sélectionnez la raison</option>
                  <option>Problèmes de paiement</option>
                  <option>Violation de la loi</option>
                  <option> Problèmes de racisme</option>
                </select>

              </div>

              <div class="form-group">
                <textarea name="assoc_specific" required placeholder="Précisez votre raison" id="" cols="30" rows="10" class="form-control"></textarea>


              </div>

              <div class="form-group">
                <button type="submit" name="reportage" class="btn btn-dark">Envoyer</button>
                <button type="reset" data-dismiss="modal" class="btn btn-danger">Annuler</button>
              </div>

            </div>
          </div>
        </div>
      </form>
      <!-- <div class="modal-footer">
        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancel Operation</button>
      </div> -->
    </div>
  </div>
</div>
<?php 
$invitationlink="https://justbtweenus.com/UI/users/grpMember/invitation?urlencryptp2p=". base64_encode(urlencode(md5($hashsalt2))). "&&requestedtracker=".base64_encode(urlencode(($token)));  
if(isset($_POST['sendInvitation'])){
  $email=$_POST['email'];
  $emailarray=(explode(",",$email));
 
  echo '<script type="text/javascript">window.location =("singleAssoc?requestajaxhiddenId='.protector1().'&&requesteddemo='.actor($token).'&&selectedproduct='.protector2().'")</script>';

foreach($emailarray as $email){
   invite($email,$invitationlink,$token);
}

 
}  
?>