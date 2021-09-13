<?php
// server services
include_once 'includes/server.inc.php';

//$weekpast = date('Y-m-d H:i:s', strtotime('-7 days'));

//$weekuser = strtotime('2020-09-11 07:06:21');
?>
<?php
$selectuserdates = select("joinin_date", 'user_member', "token !='684922425'");
$selectassocdate = select('created_date', 'association', "status !='72498497248'");
$transactionweek = select('date', 'payment', "status !='47249224'");
function memberweeks($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400));
}
$counter = 0;
//var_dump($selectuserdates);
foreach ($selectuserdates as $key) {
    # code...
    $fetchuserdates = $key['joinin_date'];
    $today = date('Y-m-d H:i:s');
    // Start date 
    $date1 = $fetchuserdates;
    // End date 
    $date2 = $today;
    // Function call to find date difference 
    $dateDiff = memberweeks($date1, $date2);
    if ($dateDiff <= 7) {

        $counter++;

        //echo($dateDiff);

    }
}

#new member in month
function membermonths($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 2592000));
}
$monthuser = 0;
//var_dump($selectuserdates);
foreach ($selectuserdates as $key) {
    # code...
    $fetchuserdates = $key['joinin_date'];
    $today = date('Y-m-d H:i:s');
    // Start date 
    $date1 = $fetchuserdates;
    // End date 
    $date2 = $today;
    // Function call to find date difference 
    $dateDiff = membermonths($date1, $date2);
    if ($dateDiff <= 7) {

        $monthuser++;

        //echo($dateDiff);

    }
}

# association weeks entry
function assocweeks($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400));
}
$counter1 = 0;
//var_dump($selectuserdates);
foreach ($selectassocdate as $weekloop) {
    # code...
    $fetchuserdates = $weekloop['created_date'];
    $today = date('Y-m-d');
    // Start date 
    $date1 = $fetchuserdates;
    // End date 
    $date2 = $today;
    // Function call to find date difference 
    $dateDiff = assocweeks($date1, $date2);
    if ($dateDiff <= 7) {

        $counter1++;

        //echo($dateDiff);

    }
}
#association in a month
function assocmonth($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 2592000));
}
$monthassoc = 0;
//var_dump($selectuserdates);
foreach ($selectassocdate as $weekloop) {
    # code...
    $fetchuserdates = $weekloop['created_date'];
    $today = date('Y-m-d');
    // Start date 
    $date1 = $fetchuserdates;
    // End date 
    $date2 = $today;
    // Function call to find date difference 
    $dateDiff = assocmonth($date1, $date2);
    if ($dateDiff <= 7) {

        $monthassoc++;

        //echo($dateDiff);

    }
}
#transactions in week
function transactionweeks($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400));
}
$counter2 = 0;
//var_dump($selectuserdates);
foreach ($transactionweek as $transweeks) {
    # code...
    $fetchuserdates = $transweeks['date'];
    $today = date('Y-m-d');
    // Start date 
    $date1 = $fetchuserdates;
    // End date 
    $date2 = $today;
    // Function call to find date difference 
    $dateDiff = transactionweeks($date1, $date2);
    if ($dateDiff <= 7) {

        $counter2++;

        //echo($dateDiff);

    }
}

#transaction in month
function transmonth($date1, $date2)
{
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);

    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 2592000));
}
$transinmonth = 0;
//var_dump($selectuserdates);
foreach ($transactionweek as $transweeks) {
    # code...
    $fetchuserdates = $transweeks['date'];
    $today = date('Y-m-d');
    // Start date 
    $date1 = $fetchuserdates;
    // End date 
    $date2 = $today;
    // Function call to find date difference 
    $dateDiff = transmonth($date1, $date2);
    if ($dateDiff <= 7) {

        $transinmonth++;

        //echo($dateDiff);

    }
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>

    <title>Jbu - Admin Panel</title>

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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <h5 class="dark">Nouvelles associations </h5>

                                            <div class="card-content">
                                                <ul class="list-inline clearfix pt-1 mb-0">
                                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $counter1; ?></h2>
                                                        <span class="primary"></span>
                                                        Cette semaine</span>
                                                    </li>
                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"> <?php echo $monthassoc; ?></h2>
                                                        <span class="danger"></span>
                                                        Ce mois-ci</span>
                                                    </li>
                                                </ul><br>
                                                <div class="card-header mb-2 pt-0">
                                                    <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <h4 class="">Associations Status</h4>

                                            <div class="card-content">
                                                <ul class="list-inline clearfix pt-1 mb-0">
                                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $assocSelector1; ?></h2>
                                                        <span class="primary"></span>
                                                        Active</span>
                                                    </li>
                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $assocSelector; ?></h2>
                                                        <span class="danger"></span>
                                                        Pending</span>
                                                    </li>

                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $assocSuspended; ?></h2>
                                                        <span class="danger"></span>
                                                        Suspended</span>
                                                    </li>

                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $assocterminated; ?></h2>
                                                        <span class="danger"></span>
                                                        Terminated</span>
                                                    </li>

                                                </ul><br>
                                                <div class="card-header mb-2 pt-0">
                                                    <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <div class="card-header mb-2 pt-0">
                                                <h4 class="secondary">Toutes les associations</h4>
                                                <h3 class="font-large-2 text-bold-200" style="color: #ffa200;"><?php echo $allassociations; ?> <span class="font-medium-1 grey darken-1 text-bold-400">Associations</span></h3>
                                            </div>
                                            <div class="card-header mb-2 pt-0">
                                                <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <h5 class="dark">Nouvelles membres</h5>

                                            <div class="card-content">
                                                <ul class="list-inline clearfix pt-1 mb-0">
                                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $counter; ?></h2>
                                                        <span class="primary"></span>
                                                        Cette semaine</span>
                                                    </li>
                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $monthuser; ?></h2>
                                                        <span class="danger"></span>
                                                        Ce mois-ci</span>
                                                    </li>
                                                </ul><br>
                                                <div class="card-header mb-2 pt-0">
                                                    <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <h4 class="">Membership Status</h4>

                                            <div class="card-content">
                                                <ul class="list-inline clearfix pt-1 mb-0">
                                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $activemember; ?></h2>
                                                        <span class="primary"></span>
                                                        Active</span>
                                                    </li>
                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $pendingmember; ?></h2>
                                                        <span class="danger"></span>
                                                        Pending</span>
                                                    </li>

                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;">N/A</h2>
                                                        <span class="danger"></span>
                                                        Blocked</span>
                                                    </li>


                                                </ul><br>
                                                <div class="card-header mb-2 pt-0">
                                                    <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <div class="card-header mb-2 pt-0">
                                                <h4 class="secondary">Toutes membres</h4>
                                                <h3 class="font-large-2 text-bold-200" style="color: #ffa200;"><?PHP echo $memberselector; ?> <span class="font-medium-1 grey darken-1 text-bold-400">Membres</span></h3>
                                            </div>
                                            <div class="card-header mb-2 pt-0">
                                                <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <h5 class="dark">Nouvelles Transactions</h5>

                                            <div class="card-content">
                                                <ul class="list-inline clearfix pt-1 mb-0">
                                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?PHP echo $counter2; ?> </h2>
                                                        <span class="primary"></span>
                                                        Cette semaine</span>
                                                    </li>
                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?PHP echo $transinmonth; ?></h2>
                                                        <span class="danger"></span>
                                                        Ce mois-ci</span>
                                                    </li>
                                                </ul><br>
                                                <div class="card-header mb-2 pt-0">
                                                    <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <h4 class="">Payment Transactions Status</h4>

                                            <div class="card-content">
                                                <ul class="list-inline clearfix pt-1 mb-0">
                                                    <li class="border-right-grey border-right-lighten-2 pr-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $completepayment; ?></h2>
                                                        <span class="primary"></span>
                                                        Complete</span>
                                                    </li>
                                                    <li class="pl-2">
                                                        <h2 class="grey darken-1 text-bold-400" style="color: #ffa200;"><?php echo $uncompletepayment; ?></h2>
                                                        <span class="danger"></span>
                                                        Pending</span>
                                                    </li>



                                                </ul><br>
                                                <div class="card-header mb-2 pt-0">
                                                    <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                                        <div class="my-1 text-center">
                                            <div class="card-header mb-2 pt-0">
                                                <h4 class="secondary">All payments transactions</h4>
                                                <h3 class="font-large-2 text-bold-200" style="color: #ffa200;"><?php echo $paymentselector; ?> <span class="font-medium-1 grey darken-1 text-bold-400">Associations</span></h3>
                                            </div>
                                            <div class="card-header mb-2 pt-0">
                                                <button class="btn btn-dark btn-block btn-square" style="background-color: #444;">Plus d'information</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
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