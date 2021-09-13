
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/melody/template/demo/pages/forms/validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jun 2020 01:21:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JBS | New Association</title>


  <?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../includes/disableright.inc.php';

?>


  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>


  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <?php include_once './memberpages/navbar.inc.php';?>
    </nav>








    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?php include_once './memberpages/leftside.inc.php';?>
      </nav>


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">



          <div class="page-header">
            <h3 class="page-title">
                Register New Aaaociation
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Nouvelle association</li>
                </ol>
            </nav>
          </div>

          <div class="row grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fill in the following form to register association</h4>

                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label class="col-form-label">Association Name</label>
                    </div>
                    <div class="col-lg-8">
                      <input class="form-control" maxlength="30" name="defaultconfig-2" id="defaultconfig-2" type="text" placeholder="Type Something..">
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label class="col-form-label">Number of Association</label>
                    </div>
                    <div class="col-lg-8">
                      <input class="form-control" min="3" max="30" name="defaultconfig-2" id="defaultconfig-2" type="text" placeholder="Type Something..">
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label class="col-form-label">Amount to be paid</label>
                    </div>
                    <div class="col-lg-8">
                      <input class="form-control" data-inputmask="'alias': 'currency'" />
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label class="col-form-label">Date of starting</label>
                    </div>
                    <div class="col-lg-8">
                      <div id="datepicker-popup" class="input-group date datepicker">
                        <input type="text" class="form-control">
                        <span class="input-group-addon input-group-append border-left">
                          <span class="far fa-calendar input-group-text"></span>
                        </span>
                      </div>
                    </div>
                  </div> 



                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label class="col-form-label">Timeflame</label>
                    </div>
                    <div class="col-lg-8">
                      <select class="form-control">
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Yearly</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-3">
                      <label class="col-form-label">Description</label>
                    </div>
                    <div class="col-lg-8">
                      <textarea id="maxlength-textarea" class="form-control" maxlength="200" rows="3" placeholder="Type Description of association."></textarea>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>

                </div>
              </div>
            </div>
        </div>



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


  <!-- Custom js for this page-->
  <script src="../../assets/js/formpickers.js"></script>
  <script src="../../assets/js/form-addons.js"></script>
  <script src="../../assets/js/x-editable.js"></script>
  <script src="../../assets/js/dropify.js"></script>
  <script src="../../assets/js/dropzone.js"></script>
  <script src="../../assets/js/jquery-file-upload.js"></script>
  <script src="../../assets/js/formpickers.js"></script>
  <script src="../../assets/js/form-repeater.js"></script>
  <!-- End custom js for this page-->






</body>


<!-- Mirrored from www.bootstrapdash.com/demo/melody/template/demo/pages/forms/validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jun 2020 01:21:57 GMT -->
</html>
