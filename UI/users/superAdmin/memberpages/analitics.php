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

    <title>Google Analytics</title>

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


<!--/ Analitics -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <div class="card">
            <div class="card-header border-0-bottom">
                <h4 class="card-title">Visitors Overview</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row my-1">
                        <div class="col-lg-4 col-12">
                            <div class="text-center">
                                <h3>23,454</h3>
                                <p class="text-muted">Page Views <span class="success"><i class="feather icon-arrow-up"></i> 8.16%</span></p>
                                <div id="sp-tristate-bar-total-revenue"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="text-center">
                                <h3>6,630</h3>
                                <p class="text-muted">Unique Visitor <span class="danger"><i class="feather icon-arrow-down"></i> 2.30%</span></p>
                                <div id="sp-stacked-bar-total-sales"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="text-center">
                                <h3>86,578</h3>
                                <p class="text-muted">Total Visits <span class="warning"><i class="feather icon-arrow-up"></i> 4.27%</span></p>
                                <div id="sp-bar-total-cost"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Analytics spakline & chartjs  -->

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