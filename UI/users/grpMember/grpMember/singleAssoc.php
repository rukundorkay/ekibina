<!DOCTYPE html>

<html lang="en">

<head>

<title>Member | Association</title>

<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../includes/disableright.inc.php';

?>
 
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
                    <h3 class="d-none d-md-block">Rwanda Graphic designers</h3>
                    <h4 class="d-block d-md-none">Rwanda Graphic designers</h4>
                    <p class="mb-md-0">Association short description</p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <a style="color: white;" class="btn btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#exampleModal-4">Invite people</a>
                </div>
              </div>
            </div>
          </div>
          <!-- end of page header -->



       <!-- START OF DASHBOARD CARDS -->

          <div class="row grid-margin">


            <?php include_once './memberpages/singleAssocAccount.inc.php';?>


          </div>
          <div class="row">
          <div class="col-md-12 grid-margin grid-margin-md-0 ">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">List Of Association Members</h4>

                <a href="" style="text-decoration: none; color: black;">
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">

                      <img class="img-sm rounded-circle" src="../../assets/images/faces/face5.jpg" alt="profile">

                      <div class="wrapper ml-3" style="border-left: 1px solid #ececea; padding-left: 10px; width: 300px;">
                          <h6 class="mb-1">Mugenzin Jean Marie Vianney</h6>
                          <small class="text-muted mb-0"><i class="fas fa-check-circle mr-1" style="color: green;"></i>Position 5</small>
                          <small class="text-muted mb-0"><i class="fas fa-map-marker-alt mr-1"></i>Rwanda</small>
                      </div>

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px;">
                          <h6 class="mb-1">Contact</h6>
                          <small class="text-muted mb-0"><i class="fas fa-phone mr-1"></i>	+250 788 887 7777</small>
                      </div>

                      <div class="badge badge-pillb ml-auto px-1 py-1" style="text-decoration: none; color: dodgerblue;">
                        <i class="fa fa-angle-double-down font-weight-bold"></i>
                      </div>

                  </div>
                </a>

                <a href="" style="text-decoration: none; color: black;">
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">

                      <img class="img-sm rounded-circle" src="../../assets/images/faces/face5.jpg" alt="profile">

                      <div class="wrapper ml-3" style="border-left: 1px solid #ececea; padding-left: 10px; width: 300px;">
                          <h6 class="mb-1">Ishimwe Yvan</h6>
                          <small class="text-muted mb-0"><i class="fas fa-spinner mr-1" style=""></i>Position 7</small>
                          <small class="text-muted mb-0"><i class="fas fa-map-marker-alt mr-1"></i>France</small>
                      </div>

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px;">
                          <h6 class="mb-1">Contact</h6>
                          <small class="text-muted mb-0"><i class="fas fa-phone mr-1"></i>	+250 788 887 7777</small>
                      </div>

                      <div class="badge badge-pillb ml-auto px-1 py-1" style="text-decoration: none; color: dodgerblue;">
                        <i class="fa fa-angle-double-down font-weight-bold"></i>
                      </div>

                  </div>
                </a>
                
                <a href="" style="text-decoration: none; color: black;">
                  <div class="wrapper d-flex align-items-center py-2 border-bottom">

                      <img class="img-sm rounded-circle" src="../../assets/images/faces/face5.jpg" alt="profile">

                      <div class="wrapper ml-3" style="border-left: 1px solid #ececea; padding-left: 10px; width: 300px;">
                          <h6 class="mb-1">Rukundo Janvier</h6>
                          <small class="text-muted mb-0"><i class="fas fa-circle mr-1" style="color: green;"></i>Position 20</small>
                          <small class="text-muted mb-0"><i class="fas fa-map-marker-alt mr-1"></i>Burundi</small>
                      </div>

                      <div class="wrapper ml-3 d-none d-md-block" style="border-left: 1px solid #ececea; padding-left: 10px;">
                          <h6 class="mb-1">Contact</h6>
                          <small class="text-muted mb-0"><i class="fas fa-phone mr-1"></i>	+250 788 887 7777</small>
                      </div>

                      <div class="badge badge-pillb ml-auto px-1 py-1" style="text-decoration: none; color: dodgerblue;">
                        <i class="fa fa-angle-double-down font-weight-bold"></i>
                      </div>

                  </div>
                </a>

            </div>
          </div>
          </div>




          <!--LIST OF ASSOCIATION MEMBERS
          <div class="card" id="cardingtable">
            <div class="card-body">
              <h4 class="card-title">List Of Association Members</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table table-striped">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th >Member Names</th>
                            <th class="">Country</th>
                            <th>Status</th>
                            <th class="">Contact</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td ><i class="far fa-check-circle btn-icon-prepend" style="color: green;"></i> Ivan Ishimwe</td>
                            <td class="">Rwanda</td>
                            <td>
                              <label class="badge badge-warning">
                                <i class="far fa-check-square btn-icon-prepend"></i>
                                Paid
                              </label>
                            </td>
                            <td class="">
                              +250 788 887 7777 (Burundi)
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                            <i class="fa fa-spinner btn-icon-prepend"></i>
                             Jaures Habineza</td>
                            <td class="">USA</td>
                            <td>
                              <label class="badge badge-danger">
                                <i class="fa fa-exclamation-triangle btn-icon-prepend"></i>
                                Not paid
                              </label>
                            </td>
                            <td class="">
                              +250 788 887 7777 (Rwanda)                           
                            </td>
                        </tr>
                        

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          END LIST OF ASSOCIATION MEMBERS
          -->



          <!-- start of new members -->





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
        <h5 class="modal-title" id="ModalLabel">Invite People</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
        <div class="modal-body">

          <p>Copy the following link and send it to the people you’d like to invite.</p>
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
                      <input type="text" id="clipboardExample1" class="form-control" value="https://jausolutions.com/">
                      <div class="mt-3">
                        <button type="button" class="btn btn-info btn-clipboard" data-clipboard-action="copy" data-clipboard-target="#clipboardExample1">Copy Link</button>
                        <button type="button" class="btn btn-success btn-clipboard" data-clipboard-action="cut" data-clipboard-target="#clipboardExample1">Cut Link</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>Or Fill email address of the people you’d like to invite.</p>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                    <!--
                      <h4 class="card-title">clipboard on text input</h4>
                      <p class="card-description">Cut/copy from text input</p>-->
                      <input type="email" id="clipboardExample1" class="form-control" value="" placeholder="Enter email">
                      <div class="mt-3">
                        <button type="button" class="btn btn-info btn-clipboard"  >Send Invitation</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>