<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <title>Association memberships</title>
  <?php  // server services
  include_once 'includes/server.inc.php';
  ?>

  <!-- BEGIN: css.include-->
  <?php
  include_once 'includes/css.inc.php';
  ?>
  <!-- END: css.include-->



</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding content-detached-left-sidebar app-contacts " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

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
  //get group token
  $token = unhash($_GET['token']);
  //selection off association info
  $selectionAssociationInfo = select('*', 'association,currency', "groupToken ='$token' and association.currency_id=currency.currency_id");
  foreach ($selectionAssociationInfo as $associationInfo) {
    $associationName = $associationInfo['association_name'];
    $associationAmount = $associationInfo['amount'];
    $associationDescription = $associationInfo['description'];
    $timeframe = $associationInfo['time_frame'];
    $currencySymbol = $associationInfo['symbol'];
    $associationId = $associationInfo['association_id'];
    $associationstatus = $associationInfo['status'];
  }

  #current tour
  $selectionTour = select('*', 'tour', "tour.association_id='$associationId'");
  foreach ($selectionTour as $tourInfo) {
    $currentTour = $tourInfo['current_tour'];
    $totalTour = $tourInfo['numberOf_tour'];
  }
  #count member of association
  $countMembers = countAffectedRows('member_association,association', "member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 ) and association.groupToken='$token'");
  //selection of associationmate information
  $data = 'phone_number,country_id,date,user_member.member_id,member_profile,user_member.last_name,user_member.first_name,user_member.email,member_association.ma_id,member_association.status,member_association.ownedTour_number,member_association.memberType_id';

  $membersofassociation = select($data, 'member_association,association,user_member', "user_member.member_id =member_association.member_id and  member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 )and association.groupToken='$token' ");
  #selection of admin info
  $adminofassociation = select($data, 'member_association,association,user_member', "user_member.member_id =member_association.member_id and  member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 )and association.groupToken='$token' and member_association.memberType_id='1'");



  ?>
  <!-- END: Main Menu-->
  <!-- BEGIN: Content-->
  <div class="app-content container center-layout mt-2">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">

        <div class="row">
          <div class="col-lg-12 col-xl-12">
            <div id="accordionWrap1" role="tablist" aria-multiselectable="true">
              <div class="card accordion collapse-icon accordion-icon-rotate">
                <div id="heading12" class="card-header primary" data-toggle="collapse" href="#accordion12" aria-expanded="false" aria-controls="accordion12">
                  <a class="card-title lead" href="#" style="color: black;" title="This association have been reported">
                    <h4 class="card-title"><?php echo $associationName; ?><i class="feather icon-chevron-down"></i></h4>
                  </a>
                </div>
                <div id="accordion12" role="tabpanel" data-parent="#accordionWrap1" aria-labelledby="heading12" class="collapse" aria-expanded="false">
                  <div class="card-content">
                    <div class="card-body">
                      <p class="card-text"><?php echo $associationDescription; ?></p>
                      <hr>
                      <div class="row">
                        <!-- Reported Association End -->
                        
                        <!-- Element timer start -->
                        <div class="col-lg-6 col-12">
                          <h5 class="text-muted"> You have to suspend or unsuspend this association in a given period of time</h5>
                          <div class="form-group">
                            <!-- button group -->
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <?php

                              if($associationstatus == 0){?>

                              <a href="suspendAssoc?association=<?php echo actor($associationId); ?>" class="btn btn-outline-warning block" >Suspend</a>
                            <?php  } else{  ?>
                              <a href="unsuspendassoc?association=<?php echo actor($associationId); ?>" class="btn btn-dark block" >Unsuspend</a>
                            <?php }?>
                            </div>
                          </div>
                        </div>
                        <!-- Report Association End -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grouped multiple cards for statistics starts here -->
        <div class="row grouped-multiple-statistics-card">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-xl-4 col-sm-6 col-12">
                    <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                      <span class="card-icon dark d-flex justify-content-center mr-3">
                        <i class="icon p-1 icon-users customize-icon font-large-2 p-1"></i>
                      </span>
                      <div class="stats-amount mr-3">
                        <h3 class="heading-text text-bold-600"><?php if (isset($totalTour)) echo $totalTour;
                                                                else echo $countMembers; ?></h3>
                        <p class="sub-heading">Memberships</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4 col-sm-6 col-12">
                    <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                      <span class="card-icon success d-flex justify-content-center mr-3">
                        <i class="icon p-1 icon-target customize-icon font-large-2 p-1"></i>
                      </span>
                      <div class="stats-amount mr-3">
                        <h3 class="heading-text text-bold-600"><?php if (isset($currentTour)) echo $currentTour;
                                                                else echo "NONE"; ?></h3>
                        <p class="sub-heading">Active position</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xl-4 col-sm-6 col-12">
                    <div class="d-flex align-items-start">
                      <span class="card-icon dark d-flex justify-content-center mr-3">
                        <i class="icon p-1 icon-credit-card customize-icon font-large-2 p-1"></i>
                      </span>
                      <div class="stats-amount mr-3">
                        <h3 class="heading-text text-bold-600"><?php echo $currencySymbol . " " . $associationAmount ?></h3>
                        <p class="sub-heading">Contribution</p>
                      </div>
                      <span class="inc-dec-percentage">
                        <small class="success"> <?php echo $timeframe ?></small>
                      </span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Grouped multiple cards for statistics ends here -->

        <section class="row all-contacts">
          <div class="col-12">
            <div class="card">
              <div class="card-head">
                <div class="card-header">
                  <h4 class="card-title">ASSOCIATION MEMBERSHIPS</h4>
                </div>
                <div class="card">
                  <div class="card-content pt-2 px-1">
                    <div class="row">
                      <div class="col-6 d-flex">
                        <div class="ml-1">
                          <?php
                          foreach ($adminofassociation as $adminInfo) {
                            $adminFname = $adminInfo['first_name'];
                            $adminLname = $adminInfo['last_name'];
                            $adminId = actor($adminInfo['member_id']);
                          }
                          ?>
                          <h4 class="power-consumption-stats-title text-bold-500">
                            <a style="color: black" href="assocAdminProfile?admin=<?php echo $adminId; ?>"><?php echo $adminFname . " " . $adminLname; ?></a>
                          </h4>
                          <p>Association Admin</p>
                        </div>
                      </div>
                      <div class="col-6  d-flex justify-content-end pr-3">
                        <div class="form-group">
                          <a href="assocAdminProfile?admin=<?php echo $adminId; ?>" class="btn btn-icon btn-pure light mr-1"><i class="fa fa-eye"></i></a>
                        </div>
                      </div>
                    </div>
                    <div id="spline-chart"></div>
                  </div>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Position</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($membersofassociation as $member) {
                          $date;
                          $fName  = $member['first_name'];
                          $lName  = $member['last_name'];
                          $mstatus = $member['last_name'];
                          $maid = $member['ma_id'];
                          $memberId = $member['member_id'];
                          $tourstatus = $member['status'];
                          $email = $member['email'];
                          $tour = $member['ownedTour_number'];
                          $memberMage  = $member['member_profile'];
                          $country = $member['country_id'];
                          $selectCountryData = select('*', 'country', "country_id='$country'");
                          $phone = $member['phone_number'];
                          foreach ($selectCountryData as $countryData) $countryName = $countryData['country_name'];
                        ?>
                          <tr>
                            <td>
                              <div class="media">
                                <div class="media-body media-middle">
                                  <a href="memberProfile?member=<?php echo actor($memberId); ?>" class="media-heading name" style="color: black"><?php echo $fName . " " . $lName; ?></a>
                                </div>
                              </div>
                            </td>
                            <td class=""><?php echo $email; ?></td>
                            <td class="phone"><?php echo $phone; ?></td>
                            <td class="">
                              <i class="<?php if ($currentTour > $tour) echo "fa fa-check-circle mr-1";
                                        elseif ($currentTour < $tour) echo "fa fa-spinner mr-1";
                                        elseif ($currentTour == $tour) echo "fa fa-circle mr-1" ?> " style="color: green;"></i>Position <?php if ($tourstatus == 1) echo "(not generated)";
                                                                                                                                                                                                                                                        else echo $tour; ?>
                            </td>
                            <td>
                              <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="memberProfile?member=<?php echo actor($memberId); ?>" type="button" class="btn btn-outline-dark"><i class="fa fa-eye"></i> View</a>

                                  <?php

                                  ?>
                                  <a href="suspendmember?member=<?php echo actor($memberId); ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-exclamation-triangle"></i> Suspend</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>

    <!-- Please do not delete this div -->
    <div class="sidebar-detached sidebar-left">
      <div class="sidebar">
        <div class="bug-list-sidebar-content">
        </div>
      </div>
    </div>
    <!--End Please do not delete this div -->

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

</html>