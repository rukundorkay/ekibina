
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
  


<head>
<?php // server services
    include_once 'includes/server.inc.php';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Promotion</title>
    <link rel="apple-touch-icon" href="../../../assets/superAdmin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/superAdmin/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/app-assets/css/pages/app-contacts.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/superAdmin/assets/css/style.css">
	<!-- END: Custom CSS-->
	




    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/quill/quill.snow.css">
    <!-- END: Vendor CSS-->


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-email.min.css">
    <!-- END: Page CSS-->


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
			<!--

<section class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="bug-list-search">
					<div class="bug-list-search-content">
    					<div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu font-large-1"></i></div>
						<form action="#">
							<div class="position-relative">
								<input type="search" id="search-contacts" class="form-control" placeholder="Search contacts...">
								<div class="form-control-position">
									<i class="fa fa-search text-size-base text-muted la-rotate-270"></i>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
-->

<!-- Grouped multiple cards for statistics starts here -->
<div class="row grouped-multiple-statistics-card">

  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-xl-12 col-sm-6 col-12">
            <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
              <span class="card-icon primary d-flex justify-content-center mr-3">
                <i class="icon p-1 icon-bar-chart customize-icon font-large-2 p-1"></i>
              </span>
              <div class="stats-amount mr-3">
                <h3 class="heading-text text-bold-600">29 Associations</h3>
                <p class="sub-heading">Avoir une promotion ce mois-ci</p>
              </div>
			  <!--
              <span class="inc-dec-percentage">
                <small class="success"><i class="fa fa-long-arrow-up"></i> 5.2%</small>
              </span>
			  -->
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
					<h4 class="card-title">Liste des associations</h4>
				</div>

			</div>
			<div class="card-content">
				<div class="card-body">
					<!-- Task List table -->
					<div class="table-responsive">
						<table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle table-striped">
							<thead>
								<tr>
                  <th>#</th>
									<th>Association</th>
									<th>Administrateur</th>
									<th>Date de création</th>
                  <th>Action</th>
								</tr>
							</thead>
							<tbody>

								<tr>
                  <th>1</th>
									<td class="">Rwanda Graphic Design</td>
									<td class="phone">Mugenzi Jmv</td>
                  <td class="phone">7 / 9/ 2020</td>
									<td>
									  <div class="form-group">
                      <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="assocAdminProfile" type="button" class="btn btn-outline-dark"><i class="fa fa-eye"></i> Vue</a>
                          <button type="button" class="btn btn-outline-danger"><i class="fa fa-exclamation-triangle"></i> Suspendre</button>
                          <button type="button" class="btn btn-outline-dark"><i class="fa fa-refresh"></i> Mettre fin à la promotion</button>
                        </div>
                      </div>
									</td>
								</tr>

								<tr>
                  <th>2</th>
									<td class="">Jau Solutions</td>
									<td class="phone">Habineza Jaures</td>
									<td class="">20 / 8 / 2020</td>
									<td>
									  <div class="form-group">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="assocAdminProfile" type="button" class="btn btn-outline-dark"><i class="fa fa-eye"></i>Vue</a>
                        <button type="button" class="btn btn-outline-danger"><i class="fa fa-exclamation-triangle"></i> Suspendre</button>
                        <button type="button" class="btn btn-outline-dark"><i class="fa fa-refresh"></i> Mettre fin à la promotion</button>
                      </div>
                    </div>
									</td>
								</tr>

								<tr>
									<td class="">3</td>
									<td class="phone">Jus Bwtween Us</td>
									<td class="">Edgar Emelyne</td>
                  <td class="">8 / 9 /2020</td>
									<td>
									  <div class="form-group">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="assocAdminProfile" type="button" class="btn btn-outline-dark"><i class="fa fa-eye"></i> Vue</a>
                        <button type="button" class="btn btn-outline-danger"><i class="fa fa-exclamation-triangle"></i> Suspendre</button>
                        <button type="button" class="btn btn-outline-dark"><i class="fa fa-refresh"></i> Mettre fin à la promotion</button>
                      </div>
                    </div>
									</td>
								</tr>

							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Association</th>
									<th>Administrateur</th>
									<th>Date de création</th>
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
     //  include_once 'includes/Customizer.php';
    ?>
    <!-- END: Customizer-->



    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
    <?php
    // including footer
       include_once 'includes/footer.php';
    ?>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../assets/superAdmin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../assets/superAdmin/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/tables/jquery.dataTables.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/extensions/jquery.raty.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../assets/superAdmin/app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/js/core/app.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../assets/superAdmin/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
    <script src="../../../assets/superAdmin/app-assets/js/scripts/pages/app-contacts.min.js"></script>
	<!-- END: Page JS-->
	
	<script src="../../../assets/superAdmin/app-assets/vendors/js/forms/quill/quill.js"></script>
	

  </body>
  <!-- END: Body-->



</html>





<!-- Compose Mail Modal 
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
                      <input type="text" id="emailfrom" class="form-control" placeholder="user@example.com" disabled value="mugenzijmv@gmail.com">
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
         form start end--


	  </div>
	</div>
  </div>
</div>
-->