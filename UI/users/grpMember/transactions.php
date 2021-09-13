<?php

// including the CSS STYLES

include_once './memberpages/cssstyles.inc.php';
// disabling right click
include_once '../../includes/disableright.inc.php';
// server services
include_once './memberpages/server.inc.php';

#member transactions queries select
$data='payment.date,association_name,payment.amount,symbol,payment.fees,stripe_paymentId';
$creditSelector = select($data, 'payment,association,user_member,member_association,currency', " association.association_id=member_association.association_id and user_member.member_id=member_association.member_id and payment.sender_id=member_association.ma_id and user_member.member_id='$id' and currency.currency_id=association.currency_id and payment.status=0");
$debitSelector = select($data, 'payment,association,user_member,member_association,currency', " association.association_id=member_association.association_id and user_member.member_id=member_association.member_id and payment.ma_id=member_association.ma_id and user_member.member_id='$id' and currency.currency_id=association.currency_id and payment.status=0");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JBS | Mes Transactions</title>

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
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row grid-margin">
            <div class="col-12">
              <div class="card" style="border-radius: 0px;border-top:solid 4px #444;">
                <div class="card-body">
                  <h4 class="card-title">
                    <img src="../../assets/images/svg/seo-and-web.svg" style="width: 30px;" alt="">

                    Mes opérations de paiement</h4>

                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>Date de paiement</th>
                          <th>Montant payé</th>
                          <th>Frais d'application</th>
                          <th>Association</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $counter= 1;
                        foreach ($creditSelector as $transactionSelector) {
                          # fetch single rows data...
                          $transDate  = $transactionSelector['date'];
                          $amountPaid = $transactionSelector['amount'];
                          $feesPaid   = $transactionSelector['fees'];
                          $assoctraced= $transactionSelector['association_name'];
                          $symbol=$transactionSelector['symbol'];
                          $transactionId=$transactionSelector['stripe_paymentId'];

                          



                        ?>
                          <tr>
                            <td><?php echo  $counter;?></td>
                            <td><?php echo  $transactionId;?></td>

                            <td><?php echo  $transDate;?> <span class="badge badge-danger">Credited</span></td>
                            <td><?php echo  $amountPaid.' '.$symbol;?></td>
                            <td><?php echo  $feesPaid.' '.$symbol;?></td>
                            <td><?php echo  $assoctraced;?></td>
                         
                            <!-- <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td> -->
                          </tr><?php $counter ++;}
                          foreach ($debitSelector as $transactionSelector) {
                          # fetch single rows data...
                          $transDate  = $transactionSelector['date'];
                          $amountPaid = $transactionSelector['amount'];
                          $feesPaid   = $transactionSelector['fees'];
                          $assoctraced= $transactionSelector['association_name'];
                          $symbol=$transactionSelector['symbol'];
                          $transactionId=$transactionSelector['stripe_paymentId'];

                          ?>
                          <tr>
                            <td><?php echo  $counter;?></td>
                            <td><?php echo  $transactionId;?></td>

                            <td><?php echo  $transDate;?>  <span class="badge badge-success">Debited</span></td>
                            <td><?php echo  $amountPaid.' '.$symbol;?></td>
                            <td><?php echo  $feesPaid.' '.$symbol;?></td>
                            <td><?php echo  $assoctraced;?></td>
                         
                            <!-- <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td> -->
                          </tr><?php $counter++;}?>
                        



                      </tbody>
                    </table>
                  </div>


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

  <script src="../../assets/js/data-table.js"></script>
  <!-- End custom js for this page-->

</body>
</html>