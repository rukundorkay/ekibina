<?php
// including the CSS STYLES
include_once './../memberpages/cssstyles.inc.php';
?>

<!DOCTYPE html>
<html lang="en">



<head>
        <title>payment</title>         
         <link rel="stylesheet"href="css/style.css">
         <?php
         
         include_once '../memberpages/server.inc.php'; 
         require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
         $token= unhash($_GET['association']);
         $tour=unhash($_GET['tour']);
           $senderMaid=unhash($_GET['uinfo']);

         #start of receiver infomation section
         $selectReceiverId=select('*','member_association,association',"association.groupToken='$token' and member_association.ownedTour_number='$tour' and member_association.association_id=association.association_id");
         foreach($selectReceiverId as $receiverId) $receiverId=$receiverId['member_id'];

         $selectReciverInfo=select('*','association,user_member,member_association,country,currency',"association.groupToken='$token' and user_member.member_id ='$receiverId'  and user_member.member_id = member_association.member_id and association.association_id = member_association.association_id and user_member.country_id = country.country_id and association.currency_id =currency.currency_id");
            
         foreach($selectReciverInfo as $info ){
                $amount=$info['amount'];
                $maid=$info['ma_id'];
                $receiverFname=$info['first_name'];
                $receiverlname=$info['last_name'];
                $CurrentTour=$info['ownedTour_number'];
                $associationName=$info['association_name'];
                $stripeid=$info['stripe_id'];
                $currency=$info['currency_name'];
                $currencySymbol=$info['symbol'];
                $country=$info['country_name'];
                $fees=($amount*10)/100;
         
         }
         #end of receiver information section
        
         ?>
        </head>






  <!-- Required meta tags -->

  <!-- endinject -->
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />

  <?php

// including the CSS STYLES

include_once './../memberpages/cssstyles.inc.php';

// disabling right click

include_once '../../../includes/disableright.inc.php';

?>

  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../assets/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>

<body>
  <div class=" container-scroller">
     <!-- start of navigation bar 
     <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
       <?php // include_once './../memberpages/navbar.inc.php';?>
     </nav>
    end of navbar -->
  </div>

  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="main-panel w-100  documentation">

      <div class="row pt-3 align-items-center justify-content-center">
        <div class="text-center">
          <img src="../../../assets/images/logo/logo-mini(SVG).svg" alt="profile" class="img-lg rounded-circle"/>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3"></div>
				<div class="col-md-6 pt-2">
					<div class="card px-3 ">
						<div class="card-body">
							<h4 class="card-title">Payment details</h4>
							<div class="list-wrapper">
								<ul class="d-flex flex-column todo-list">

                  <div class="border-top pt-3">
                    <div class="d-flex justify-content-between">
                      <h5 class="">Association:</h5>
                      <pJust> <?php echo $associationName?></p>
                    </div>
                  </div>

                  <div class="border-top border-bottom  pt-3">
                    <div class="d-flex justify-content-between">
                      <h5 class="">Receiver:</h5>
                      <input type="hidden" id="senderName"value="<?php echo $fname." ".$lname?>" >
                      <p><label id="receiverName" value="<?php  echo $receiverFname." ".$receiverlname?>"><?php  echo $receiverFname." ".$receiverlname?></label></p>
                    </div>
                  </div>

                  <div class="border-top pt-3">
                    <div class="d-flex justify-content-between">
                      <h5>Tour:</h5>
                      <p><?php echo $CurrentTour?></p>
                    </div>
                  </div>

                  <div class="border-top pt-3">
                    <div class="d-flex justify-content-between">
                      <h5>Amount:</h5>
                      <p><?php echo $amount.''.$currencySymbol;?></p>
                    </div>
                  </div>

                  <div class="border-top border-bottom pt-3">
                    <div class="d-flex justify-content-between">
                      <h5>Feels</h5>
                      <p><?php echo $fees.' '.$currencySymbol;?></p>
                    </div>
                  </div>

                  <div class="border-top pt-3">
                    <div class="d-flex justify-content-between">
                      <h5>Total</h5>
                      <h5><?php echo $fees + $amount." ".$currencySymbol;?></b></h5>
                    </div>
                  </div>

                  <?php 
                  $intent = createIntent($amount,$maid,$currency,$country,$stripeid,$fees,$senderMaid); 
                  # ... Fetch or create the PaymentIntent;
                  ?>

                  <div class="container">
                    <form  id="payment-form">
                      <input type="hidden"name="payerName"value="<?php echo $fname." ".$lname ?> "/>
                        <div class="form-row">
                          <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element" class="form-control">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>
                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                        </div>
                        <button type="submit" data-secret="<?= $intent->client_secret ?>" name="submit" id="submit">Submit Payment </button>
                    </form>
                    <script src="https://js.stripe.com/v3/"></script>
                    <script src="js/client.js"></script>
                  </div>

								</ul>
                
							</div>
						</div>
            
					</div>
				</div>
        <div class="col-md-3"></div>
      </div>

      <div class="row pt-3 pb-5 align-items-center justify-content-center">
        <div class="preview-list">
          <div class=" px-0">
            <div class="preview-item-content  flex-grow">
              <div class="flex-grow"><br>
                  <p>You'll recieve confirmation email after successfull payment </p>
              </div>
               <a href ="../index" class=" btn btn-dark btn-block" >Go back</a>
            </div>
          </div>
        </div>
      </div>


      <footer class="footer">
        <?php include_once './../memberpages/footer.inc.php';?>
      </footer>



    </div>
  </div>
  

   




  <!-- plugins:js -->
  <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../../assets/js/off-canvas.js"></script>
  <script src="../../../assets/js/hoverable-collapse.js"></script>
  <script src="../../../assets/js/misc.js"></script>
  <script src="../../../assets/js/settings.js"></script>
  <script src="../../../assets/js/todolist.js"></script>
  <!-- endinject -->




</body>
