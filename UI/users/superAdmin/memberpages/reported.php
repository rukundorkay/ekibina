<?php 
// server services
include_once 'includes/server.inc.php';?>
<!DOCTYPE html>



<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/server/core/init.php');

// REPORTED ASSOCIATIONS SELECTOR

$reportedselector = select('*', 'reported_group,user_member,association,member_association', "reported_group.ma_id = member_association.ma_id AND member_association.member_id=user_member.member_id AND member_association.association_id=association.association_id AND reported_group.reported_id");
$reportedCounter  = countAffectedRows('reported_group,user_member,association,member_association', "reported_group.ma_id = member_association.ma_id AND member_association.member_id=user_member.member_id AND member_association.association_id=association.association_id AND reported_group.reported_id");


?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->




<head>

    <title>JBU - Reported associations</title>
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
  ?>
  <!-- END: Main Menu-->



  <!-- BEGIN: Content-->
  <div class="app-content container center-layout mt-2">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">

          <section class="row all-contacts">
          	<div class="col-12">
          		<div class="card">
          			<div class="card-head">
          				<div class="card-header">
          					<h4 class="card-title">All Reported Associations (<?php echo $reportedCounter; ?>)</h4>
          				</div>
          			</div>
          			<div class="card-content">
          				<div class="card-body">
          					<div class="table-responsive">
          						<table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle table-striped">
          							<thead>
          								<tr>
                            <th>#</th>
                            <th>Association</th>
                            <th>Date</th>
                            <th>Plaignant</th>
                            <th>Titre de question</th>
                            <th>Détails</th>
          								</tr>
          							</thead>
          							<tbody>
                        <?php

                        $tablecounter = 1;

                        foreach ($reportedselector as $reportedloop) {

                          $assoc_name = $reportedloop['association_name'];
                          $reportdate = $reportedloop['report_date'];
                          $complainer  = $reportedloop['first_name'] . " " . $reportedloop['last_name'];
                          $complainerphone = $reportedloop['phone_number'];
                          $reportitle = $reportedloop['report_type'];
                          $reporprob = $reportedloop['descrption'];
                          $gtoken = $reportedloop['groupToken'];

                        ?>
          								<tr>

                            <th style="width: 2px;"><?php echo $tablecounter ;?></th>

          									<td>
          										<div class="media">
          											<div class="media-body media-middle">
          												<a href="assocMemberships?token=<?php echo actor($gtoken)?>" class="media-heading name" style="color: black">
                                    <?php echo  $assoc_name; ?> 
                          
                                  </a>
          											</div>
          										</div>
          									</td>

          									<td><?php echo $reportdate; ?></td>

                            <td class="">
                              <a href="assocAdminProfile" class="email" href="assocAdminProfile" style="color: black;">
                              <?php echo $complainer; ?><br>
                                <small>Contact: <?php echo $complainerphone;?></small>
                              </a>
                            </td>

                            <td><?php echo $reportitle;?></td>

          									<td>
          				<small><?php echo $reporprob;?></small>
          									</td>

          								</tr> 
                          <?php $tablecounter++;
                          } ?>

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


    <!-- BEGIN: Dont delete this-->
    <?php
      // include_once 'includes/bug.inc.php';
    ?>
    <!-- END: Dont delete this-->


  </div>
  </div>
  </div>
  <!-- END: Content-->

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