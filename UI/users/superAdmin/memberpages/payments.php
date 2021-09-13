<?php 
// server services
include_once 'includes/server.inc.php';?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->




<head>
    <title>JBU - Payment Transactions</title>

    <!-- BEGIN: css.include-->
    <?php
       include_once 'includes/css.inc.php';
    ?>
    <!-- END: css.include-->

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
                <section class="row all-contacts">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h4 class="card-title">All Payment Transactions</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Task List table -->
                                    <div class="table-responsive">
                                        <table id="users-contacts" class="table table-white-space table-xl row-grouping display no-wrap icheck table-middle ">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Sender</th>
                                                    <th>Association</th>
                                                    <th>Receiver</th>
                                                    <th>Amount</th>
                                                    <th>App Fee</th>
                                                    <th>payment Id</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php

                                                $tablecounter = 1;

                                                foreach ($querySelect as $transactionsloop) {

                                                    $transacDate = $transactionsloop['date'];
                                                    $transtripe  = $transactionsloop['stripe_paymentId'];
                                                    $transamount = $transactionsloop['amount'];
                                                    $trans_fees  = $transactionsloop['fees'];
                                                    $transtatus  = $transactionsloop['status'];
                                                    $transassoc  = $transactionsloop['association_name'];

                                                    $transmember = $transactionsloop['first_name'] . "  " . $transactionsloop['last_name'];
                                                    $currencySymbol=$transactionsloop['symbol'];
                                                    $senderId=$transactionsloop['sender_id'];
                                                    #selection of receiver name
                                                    $selectionSenderInfo=select('*','user_member,member_association',"member_association.ma_id='$senderId' and user_member.member_id=member_association.member_id");


                                                    foreach($selectionSenderInfo as $senderInfo){
                                                        $senderFname=$senderInfo['first_name'];
                                                        $senderLname=$senderInfo['last_name'];
                                                    }

                                                ?>
                                                    <tr>
                                                        <td style="width: 2px;"><?php echo $tablecounter; ?></td>
                                                        <td><?php echo $transacDate; ?></td>
                                                        <?php if ($transtatus == 1) { ?>
                                                            <td><span class="badge badge-danger">Incomplete</span></td>
                                                        <?php } elseif ($transtatus == 0) { ?>
                                                            <td><span class="badge badge-success">Complete</span></td>
                                                        <?php } ?>
                                                        <td><?php echo$senderFname." ".$senderLname;?></td>

                                                        <td><?php echo $transassoc; ?></td>
                                                        <td><?php echo $transmember; ?></td>

                                                        <td><?php echo $transamount." ".$currencySymbol; ?></td>
                                                        <td><?php echo $trans_fees." ".$currencySymbol; ?></td>
                                                        <td><?php echo $transtripe; ?></td>

                                                    </tr>

                                                <?php $tablecounter++;
                                                } ?>

                                            </tbody>

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