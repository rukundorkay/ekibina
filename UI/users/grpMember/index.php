<?php
// server services
include_once './memberpages/server.inc.php';

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

//include_once '../../includes/disableright.inc.php';

?>
<!DOCTYPE html>

<html lang="en">

<head>

<title>Membre | <?php echo $fname." ".$lname;?></title>
  <style>
    .status-userNotCreated {
        padding: 2px 5px !important;
        color: #FFF;
        border-radius: 4px;
        margin-top: 5px;
        background-color: #dc3545;
        border: none;
        -moz-animation: blink normal 1s infinite ease-in-out;
        /* Firefox */
        -webkit-animation: blink normal 1s infinite ease-in-out;
        /* Webkit */
        -ms-animation: blink normal 1s infinite ease-in-out;
        /* IE */
        animation: blink normal 1s infinite ease-in-out;
        /* Opera and prob css3 final iteration */
    }

    @-moz-keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* IE */
    @-ms-keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    /* Opera and prob css3 final iteration */
    @keyframes blink {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>
 

 
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
       
          <!-- start of onboarding process-->

          <?php if($disable) {include_once './memberpages/onboarding.inc.php';}?>

        <!-- end of onboarding process--> 

          <div class="row grid-margin">

            <?php // include_once './memberpages/dashboardcards.inc.php';?>

          </div>

           <!-- START OF PAGE HEADER ->
           <div class="page-header">
            <h3 class="page-title">
            Mes associations
            </h3>
          </div>
          <!- end of page header ->

          <!- start of new members -->


          <div class="row">


          <?php include_once './memberpages/newmember.inc.php';?>


                
          </div>


    <!-- end of new members -->

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