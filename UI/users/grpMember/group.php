<!DOCTYPE html>

<html lang="en">

<head>

<title>Abanyonzi Nyabugogo</title>

<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../includes/disableright.inc.php';
// server services
include_once './memberpages/server.inc.php'; ?>


 
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
          <div class="page-header">
            <h3 class="page-title">
              Abanyonzi Nyabugogo
            </h3>
          </div>
          <!-- end of page header -->

       <!-- START OF DASHBOARD CARDS -->

          <div class="row grid-margin">


            <?php include_once './memberpages/dashboardcards.inc.php';?>


          </div>

           <!-- START OF PAGE HEADER -->
           <div class="page-header">
            <h3 class="page-title">
              Other Active Associations
            </h3>
          </div>
          <!-- end of page header -->

          <!-- start of new members -->


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

<?php include_once './memberpages/js.inc.php'; ?>

  <!-- end of js files -->

</body>
</html>