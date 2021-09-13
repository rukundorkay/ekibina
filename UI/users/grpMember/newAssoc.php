<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';

// disabling right click


// server services
include_once './memberpages/server.inc.php';

?>

<?php
          $name        = '';
          $description = "";
          $maximum     = "";
          $amount      = "";
          $frame       = "";
          $startingDate = "";
          if (isset($_POST['submit'])) {
            $name         = $_POST['associationName'];
            $description  = $_POST['description'];
            $maximum      = $_POST['maxMember'];
            $currency     = $_POST['currency'];
            $amount       = $_POST['amount'];
            $frame        = "mensuel";
            $startingDate = $_POST['startingDate'];

            //date counters and spliter
            $todayDate1 = date('m/d/Y');
            $todaydatespliter = strtotime($todayDate1);
            $givenDatespliter = strtotime($startingDate);

            //echo $todaydatespliter."hahaha".$givenDatespliter;
            if ($givenDatespliter <= $todaydatespliter) {
          //if ($givenDatespliter < $todaydatespliter) {
              # code...
              $errorMsg = "<div class='status-userNotCreated'>" . "<center>" . "<strong style='font-size:16px;color:white;font-style:italic;'>" . "The date provided is not allowed. Try again. " . "</strong>" . "</center>" . "</div>" . "<br>";
            } else {

              $ass = new association($name, $maximum, $amount, $startingDate, $frame, $currency, $description);
              $result = $ass->create_association();
              $groupData = select('*', 'association', "groupToken='$result'");
              foreach ($groupData as $data) $groupId = $data['association_id'];
              $member = new member();
              $member->joinassociation($id, 1, $groupId, 1);

              header('location:myAssocs');

            }
          }
          ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JBS | Nouvelle association</title>
  <style>
  .status-userNotCreated{padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;background-color:#dc3545;border:none;}

</style>

</head>

<body>


  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <?php include_once './memberpages/navbar.inc.php'; ?>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <?php include_once './memberpages/leftside.inc.php'; ?>
      </nav>


      <!-- partial -->
      <div class="main-panel"<?php echo$disable;?> >
        <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card" style="border-radius: 0px;border-top:solid 4px #444;">
                <div class="card-body">
                  <h4 class="card-title">
                    <img src="../../assets/images/svg/seo-and-web.svg" style="width: 30px;" alt="">

                    Remplissez le formulaire suivant pour enregistrer l'association</h4>
                    <?php echo @$errorMsg;?><br>
                  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="myform" autocomplete="off">
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label">Nom de l'association</label>
                      </div>
                      <div class="col-lg-8">
                        <input class="form-control" maxlength="30" name="associationName" id="defaultconfig-2" required type="text" placeholder="le nom de l'association ne peut pas comporter plus de 30 caractères." value='<?php echo $name; ?>' />
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label">Membres maximum de l'Association</label>
                      </div>
                      <div class="col-lg-8">
                        <input class="form-control" value='<?php echo $maximum; ?>' min="3" max="30" required name="maxMember" id="defaultconfig-2" type="number" placeholder="Entrez le nombre de membres">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label">Choisir la devise</label>
                      </div>
                      <div class="col-lg-8">
                        <select class="form-control" name="currency" required>
                          <option value="" selected disabled>Choisissez l'option</option>
                          <?php
                          $currencies = select("*", 'currency', 1);
                          foreach ($currencies as $currency) {
                          ?>
                            <option value="<?php echo $currency['currency_id'] ?>"><?php echo $currency['currency_name']; ?>(<?php echo $currency['symbol']; ?>)</option>
                          <?php } ?>

                        </select>
                      </div>
                    </div>



                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label">Montant à payer</label>
                      </div>
                      <div class="col-lg-8">
                        <input class="form-control" value='<?php echo $amount; ?>' min="3" required name="amount" id="defaultconfig-2" type="number" placeholder="Entrez le montant que vous paierez">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label">Date de début</label>
                      </div>
                      <div class="col-lg-8">
                        <div id="datepicker-popup" class="input-group date datepicker">
                          <input type="text" class="form-control" placeholder="MM/DD/YY" name="startingDate" required value='<?php echo $startingDate; ?>'>
                          <span class="input-group-addon input-group-append border-left">
                            <span class="far fa-calendar input-group-text"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-3">
                        <label class="col-form-label">La description</label>
                      </div>
                      <div class="col-lg-8">
                        <textarea name="description" id="maxlength-textarea" class="form-control" required maxlength="200" rows="3" placeholder="Type Description de l'association."><?php echo $description; ?></textarea>
                      </div>
                    </div>

                    <input type="submit" class="btn btn-dark mr-2" name="submit" value="Enregistrer l'association" />
                    <button class="btn btn-danger">Annuler</button>
                  </form>

                </div>
              </div>
            </div>
          </div>



        </div>
        <!-- content-wrapper ends -->


        <!-- including footer -->
        <footer class="footer">

          <?php include_once './memberpages/footer.inc.php'; ?>

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