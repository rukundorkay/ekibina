
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  


<head>
<?php // server services
    include_once 'includes/server.inc.php';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Just between us admin panel login, access terminal data everywhere.">
<meta name="keywords" content="jbu,jibu,admin panel,just between us,justbetweenus">
<meta name="author" content="justbetweenus">
    <title>Admins</title>
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






<section class="row all-contacts">
	<div class="col-12">
		<div class="card">
			<div class="card-head">
				<div class="card-header">
					<h4 class="card-title">Admins</h4>
					<p>Those are poeple who own association/s</p>
				</div>
			</div>
			<div class="card-content">
				<div class="card-body">
					<!-- Task List table -->
					<div class="table-responsive">
						<table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle ">
							<thead>
								<tr>
									<!--
									<th>
										<input type="checkbox" class="input-chk" id="check-all" onclick="toggle();">
                                        
										<input type="checkbox" class="custom-control-input" id="checkboxsmall">
                                        <label class="custom-control-label" for="checkboxsmall"></label>
									</th>
									-->
									<th>Name</th>
									<th>Email</th>
									<th>Associatio/s</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="media">
                                        
											<div class="media-left pr-1">
												<span class="avatar avatar-sm avatar-online rounded-circle">
													<img src="../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar">
												</span>
											</div>
                                            
											<div class="media-body">
												<a class="media-heading name">Alice Collins</a>
											</div>
										</div>
									</td>
									<td class=""><a class="email" href="mailto:email@example.com">eugene@example.com</a></td>
									<td class="phone">Granda Graphic Designers</td>
									<td class="">
									    <div class="form-group">
                                            <a href="assocMemberships" type="button" class="btn btn-icon btn-pure light mr-1"><i class="fa fa-eye"></i> View</a>
                                        </div>
									</td>
								</tr>
								<tr>
									<!--<td><input type="checkbox" class="input-chk check"></td>-->
									<td>
										<div class="media">
											<div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle">
												<img src="../app-assets/images/portrait/small/avatar-s-11.png" alt="avatar"></span></div>
											<div class="media-body media-middle mt-50">
												<a class="media-heading name">Margaret Govan</a>
											</div>
										</div>
									</td>
									<td class=""><a class="email" href="mailto:email@example.com">eugene@example.com</a></td>
									<td class="phone">
									<li class="dropdown dropdown-notification nav-item">
										<a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
										    2 Associations<i class="feather icon-chevron-down"></i>
											<!--
											<span class="badge badge-pill badge-danger badge-up">5</span>
											-->
										</a>
                                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
											<!--
                                              <li class="dropdown-menu-header">
                                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Associations</span><span class="notification-tag badge badge-danger float-right m-0"></span></h6>
                                              </li>
											  -->
                                              <li class="scrollable-container media-list">
											  <a href="javascript:void(0)">

                                                  <div class="media">
                                                    <div class="media-body">
                                                      <h6 class="media-heading">1. Rwanda Graphic Designers</h6>
                                                    </div>
                                                  </div>


                                                  <div class="media">
                                                    <div class="media-body">
                                                      <h6 class="media-heading">2. Abanyonzi Kimironko</h6>
                                                    </div>
                                                  </div>

												  
												  </a>
												  <a href="javascript:void(0)">
                                                    <div class="media"></div>
                                                  </a>
												  
												</li>
												<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">View All</a></li>

                                            </ul>
                                        </li>
										</td>
									<td class="">
									    <div class="form-group">
                                            <a href="assocMemberships" type="button" class="btn btn-icon btn-pure light mr-1"><i class="fa fa-eye"></i> View</a>
                                        </div>
									</td>
								</tr>
								<tr>
									<!--<td><input type="checkbox" class="input-chk check"></td>-->
									<td>
										<div class="media">
											<div class="media-left pr-1">
												<span class="avatar avatar-sm avatar-online rounded-circle">
													<img src="../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar">
												</span>
											</div>
											<div class="media-body media-middle">
												<a class="media-heading name">Russell Bryant</a>
											</div>
										</div>
									</td>
									<td class="">
										<a class="email" href="mailto:email@example.com">russell@example.com</a>
									</td>
									<td class="phone">

		                                <li class="dropdown dropdown-notification nav-item">
										<a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
										    3 Associations<i class="feather icon-chevron-down"></i>
											<!--
											<span class="badge badge-pill badge-danger badge-up">5</span>
											-->
										</a>
                                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
											<!--
                                              <li class="dropdown-menu-header">
                                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Associations</span><span class="notification-tag badge badge-danger float-right m-0"></span></h6>
                                              </li>
											  -->
                                              <li class="scrollable-container media-list">
											  <a href="javascript:void(0)">

                                                  <div class="media">
                                                    <div class="media-body">
                                                      <h6 class="media-heading"> 1. Jau Solutions</h6>
                                                    </div>
                                                  </div>
											

                                                  <div class="media">
                                                    <div class="media-body">
                                                      <h6 class="media-heading">2. Rwanda Graphic Designers</h6>
                                                    </div>
                                                  </div>


                                                  <div class="media">
                                                    <div class="media-body">
                                                      <h6 class="media-heading">3. Abanyonzi Kimironko</h6>
                                                    </div>
                                                  </div>

												  
												  </a>
												  <a href="javascript:void(0)">
                                                    <div class="media"></div>
                                                  </a>
												  
												</li>
												<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">View All</a></li>

                                            </ul>
                                        </li>

									</td>
									<td class="">
									
									    <div class="form-group">
                                            <a href="assocMemberships" type="button" class="btn btn-icon btn-pure light mr-1"><i class="fa fa-eye"></i> View</a>
                                        </div>
									
									</td>
								</tr>
								
							</tbody>
							<tfoot>
								<tr>
									<!--<th></th>-->
									<th>Name</th>
									<th>Email</th>
									<th>Associatio/s</th>
									<th>Action</th>
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
       include_once 'includes/Customizer.php';
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

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/horizontal-menu-template/app-contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2020 15:34:51 GMT -->
</html>