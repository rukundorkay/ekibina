
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  


<head>

    <title>JBU - List of Associations</title>

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
       

       //selection of all asssociation
       $selectionAssociation=select('*','association',1);
       //count association
       $countAssociation=countAffectedRows('association',1);
   
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
          					<h4 class="card-title">All Associations (<?php echo$countAssociation;?>)</h4>
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
          									<th>Creation Date</th>
          									<th>Actions</th>
          								</tr>
          							</thead>
          							<tbody>
                          <?php $nummber=0;
                          foreach($selectionAssociation as $association) {
                          $associationName=$association['association_name'];
                          $token=$association['groupToken'];
                          $creationDate=$association['created_date'];
                          $associationStatus=$association['status'];

                          $nummber++;
                          ?>
          								<tr>
                            <th style="width: 2px;"><?php echo$nummber;?></th>
          									<td>
          										<div class="media">
          											<div class="media-body media-middle">
          												<a href="assocMemberships?token=<?php echo actor($token)?>" class="media-heading name" style="color: black"><?php echo$associationName?>
                                  <?php if($associationStatus == 0)$iconLocation="../../../assets/images/svg/unlock.svg";elseif($associationStatus==1)$iconLocation="../../../assets/images/svg/lock.svg";elseif($associationStatus==3) $iconLocation="../../../assets/images/svg/close.svg";?>
                                  <img src="<?php echo$iconLocation?>" style="width: 25px;" alt="">
                                  </a>
          											</div>
          										</div>
          									</td>
          									<td class="phone"><?php echo$creationDate;?></td>
          									<td>
          									  <div class="form-group">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="assocMemberships?token=<?php echo actor($token)?>" type="button" class="btn btn-outline-dark"><i class="fa fa-eye"></i> View</a>
                                </div>
                              </div>
          									</td>
          								</tr><?php }?>
          							</tbody>
          							<tfoot>
          								<tr>
                            <th>#</th>
                            <th>Association</th>
          									<th>Creation Date</th>
          									<th>Actions</th>
          								</tr>
          							</tfoot>
          						</table>
          					</div>
          				</div>
          			</div>
          		</div>
          	</div>
          </section>


        </div>
        
      </div>

        <div class="sidebar-detached sidebar-left">
            <div class="sidebar">
                <div class="bug-list-sidebar-content">

                </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>
    <!-- END: Content-->


   
   <!-- BEGIN: Customizer-->
   <?php
       // including Customizer
      // include_once 'includes/Customizer.php';
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