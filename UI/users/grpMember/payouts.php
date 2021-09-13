<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

//include_once '../../includes/disableright.inc.php';

// server services
include_once './memberpages/server.inc.php';
$url=createAccountLink($stripeId);

?>
<!DOCTYPE html>

<html lang="en">

<head>

<title>Membre | <?php echo $fname." ".$lname;?></title>
 
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


      <?php include_once './memberpages/sidebar.inc.php';
      
      ?>


    </div>


      <!-- END OF SIDEBAR -->


      <!-- start of left sidebar -->

      <nav class="sidebar sidebar-offcanvas" id="sidebar">

      <?php include_once './memberpages/leftside.inc.php';?>
    
      </nav>


      <!-- end of left sidebar -->


      <!-- start of MAIN PANEL -->

      <div class="main-panel">


        <div class="content-wrapper">

        <!-- START OF PAGE HEADER -->
          <!-- <div class="page-header">
            <h3 class="page-title">
              <?php echo "erega".$assocName; ?>
            </h3>
          </div> -->
          <!-- end of page header -->

       <!-- START OF DASHBOARD CARDS -->

          <div class="row grid-margin">

            <?php // include_once './memberpages/dashboardcards.inc.php';?>

          </div>

           <!-- START OF PAGE HEADER ->
           <div class="page-header">
            <h3 class="page-title">
            Mes associations
            </h3>
          </div>
          <!- end of page header -->

              <!-- start of payout division -->
              <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-body">
                        <div class="col-lg-12 pl-lg-12 text-center">
                          <div class=" justify-content-between">
                            <div>
                              <h4 class="d-none d-sm-block">Configurer l'option de paiement</h4>
                              <h5 class="d-block d-sm-none">Configurer l'option de paiement</h5>
                              <p>Just Between Us s'associe à Stripe pour transférer les gains sur votre compte bancaire.</p>
                              <div class="mb-2">
                                <a href="<?php echo $url;?>" class="btn btn-block btn-sm btn-dark auth-form-btn"> Configurer les paiements <i class="fa fa-arrow-right mr-2"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="preview-list">
                            <div class=" px-0">
                              <div class="preview-item-content  flex-grow">
                                <div class="flex-grow"><br>
                                    <p>Vous serez redirigé vers stripe pour terminer le processus d'intégration</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2"></div>
              </div>
              <!-- end of payout division -->

            <!-- END OF CARDS DASHBOARD -->

          <!-- start of charts 1 -->

          <?php //include_once './memberpages/charts1.inc.php';?>

 

          <!-- end charts 1 -->


          <!-- start of charts 2 -->

          <?php //include_once './memberpages/charts2.inc.php';?>


          <!-- end charts 2 -->


        </div>
        <!-- content-wrapper ends -->

        <!-- including footer -->
        <footer class="footer">

          <?php include_once './memberpages/footer.inc.php';?>
          
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


<?php // include_once './memberpages/js.inc.php'; ?>

  <!-- end of js files -->

</body>
</html>