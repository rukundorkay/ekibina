
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/server/core/init.php');
$result = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $token = $_POST['token'];
    $admin = new admin();
    $result = $admin->signin($email, $password, $token);
    if ($result) {

        header("location:./");
        //will direct to index page  after login

    } else

    $result="<h6 class='status-userNotCreated'>"."<center>"."<strong style='font-size:16px;color:white;font-style:italic;'>"."Il n'existe aucun compte valide avec l'email et le mot de passe saisis. "."</strong>"."</center>"."</h6>";
}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title>Jbu - Admin Panel</title>
    <?php require_once 'includes/css.inc.php'; ?>

    <style>
        .status-userNotCreated{padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;background-color:#dc3545;border:none;}

    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="../../../assets/superAdmin/app-assets/images/logo/logo2.png" alt="branding logo">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Admin Access Terminal</span></p>
                                    <div class="card-body">
                                   <?php echo @$result; ?>
                                        <form class="form-horizontal" method="POST" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="email" class="form-control" id="user-name" placeholder="Enter Email" name="email" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            </fieldset>
                                            <input type="hidden" name="token" value="<?php echo crftoken(); ?>">

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" id="user-password" placeholder="Enter Password" name="password" required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">

                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Mot de passe oublié?</a></div>
                                            </div>
                                            <input type="submit" class="btn btn-dark btn-block" name="login" value="S'identifier">

                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php require_once 'includes/js.inc.php';?>
</body>
<!-- END: Body-->



</html>