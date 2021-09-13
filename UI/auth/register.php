<?php
  include_once '../includes/seopt.inc.php';

  // disabling right click

  include_once '../includes/disableright.inc.php';
  //add server side services
  require_once($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');
  $firstname   = "";
  $lastname    = "";
  $email       = "";
  $dateofbirth = "";
 
  $address     = "";
  $error     = "";
  $countries = select('*','country',1);
  
  
  if (isset($_POST['submit'])) {
    $firstname   = escape($_POST['firstname']);
    $lastname    = escape($_POST['lastname']);
    $password    = escape($_POST['password']);
    $confirm     = escape($_POST['confirm']);
    $email       = escape($_POST['email']);
    $dateofbirth = escape($_POST['dobDate']);
    $phonenumber = escape($_POST['phone']);
    $country     = escape($_POST['country']);
    /*if (isset($_POST['g-recaptcha-response'])) {
      $captcha = $_POST['g-recaptcha-response'];
  } else {
      $captcha = false;
  }
  
   $recaptchaResult=recaptchaValidation($captcha);
   if($recaptchaResult){ */ #remove recaptcha for blocking user

    
    
    if (empty($firstname)||empty($lastname)||empty($password)||empty($confirm)||empty($email)||empty($dateofbirth)||empty($phonenumber)||empty($country)) {
    # if there are some empty fields...
    $errorMsg="<div class='status-userNotCreated'>"."<center>"."<strong style='font-size:16px;color:white;font-style:italic;'>"."Some Fields Are empty !!. "."</strong>"."</center>"."</div>";
    
  }
  elseif ($password != $confirm) {
    # If ...
    $errorMsg="<div class='status-userNotCreated'>"."<center>"."<strong style='font-size:16px;color:white;font-style:italic;'>"."Password Mismatch!!. "."</strong>"."</center>"."</div>";
  }

  elseif ($password === $confirm) {
      $member = new member($firstname, $lastname, $email, $password, $dateofbirth, $phonenumber, $country);
      $result = $member->signup();
      if ($result == false) {
        $error = "email already registered";
      }
    }
  else{
    $errorMsg="<div class='status-userNotCreated'>"."<center>"."<strong style='font-size:16px;color:white;font-style:italic;'>"."Something Went Wrong. "."</strong>"."</center>"."</div>";
  }
}  

//} remove recaptcha for blocking user


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer un compte - JBU</title>
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="https://use.fontawesome.com/b9bdbd120a.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="build/css/intlTelInput.css">
   <link rel="stylesheet" href="../assets/showpass/css/example.wink.css">
  <style>
    .required-fields {
      font-size: 20px;
      color: red;
    }
  </style>
  <script src="https://www.google.com/recaptcha/api.js?render=6LdsU80ZAAAAAAOfzo6UfiXpUkn4C-TZUjz7Pq_J"></script>
  </head>

  <!------ Include the above in your HEAD tag 0---------->

  <section class="testimonial py-2" id="testimonial">
    <div class="container">
      <div class="row ">


        <div class="col-md-4 py-5 bg-dark text-white text-center d-none d-md-block">
          <div class=" ">
            <div class="card-body">
              <a href="../../index.html ">
              <img src="../assets/images/logo/logo-mini(SVG).svg" style="width:50%">
              </a>
              <h2 class="py-3" style="color: #ffa200;">Just Between Us</h2>
              <p>Créez votre compte avec JBU. C'est facile! . Tous les champs avec une étoile rouge (*) sont obligatoires. L'e-mail que vous fournissez sera utilisé par notre équipe pour vous envoyer des mises à jour récentes de notre part.

              </p>
            </div>
          </div>
        </div>
        


        <div class="col-md-8 py-3 border rounded">
          <h4 class="pb-4">Créons votre compte</h4>

          <?PHP echo @$errorMsg; echo @$botMsg;?>

          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete="off"id="application-form">

<div class="row">
              <div class="form-group col-md-6">
                <label>Entrez votre Prénom <strong class="required-fields">*</strong></label>
                <input id="fnaming" pattern="[A-Za-z]{3,32}" title="" name="firstname" placeholder="Ex: John" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" class="form-control" type="text" value=<?php echo $firstname; ?>>
              </div>
              <div class="form-group col-md-6">
                <label>Entrez votre Nom <strong class="required-fields">*</strong></label>
                <input id="lnaming" type="text" name="lastname" pattern="[A-Za-z]{3,32}" title="Votre nom doit comporter au moins 3 caractères et ne doit pas inclure de chiffres.Veuillez vérifier à nouveau" class="form-control" placeholder="Ex: Doe" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" value=<?php echo $lastname; ?>>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Entrer votre Email <strong class="required-fields">*</strong></label>

                <input id="emailing" title="" name="email" placeholder="email@domain.com" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" class="form-control" required="required" type="email" autocomplete="off">
                <p style="color:red;"><?php echo $error; ?></p>
              </div>
              <div class="form-group col-md-6">
                <label>Entrer votre pays <strong class="required-fields">*</strong></label>
                <select name="country" class="form-control">
                  <option selected disabled>Choisissez Votre pay</option>
                  <?php foreach ($countries as $country) { ?>
                    <option value="<?php echo $country['country_id']; ?>"><?php echo $country['country_name'];
                                                                        } ?></option>

                </select>

              </div>

            </div>

            <div class="row">
              <div class="form-group col-md-6">

                <label>Entrer votre Telephone <strong class="required-fields">*</strong></label>

                <input type="tel" class="form-control"  id="phone" name="phone"  required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false">

              </div>
              
               <!--
              <div class="form-group col-md-6">
                <label>Entrer votre Date de naissance <strong class="required-fields">*</strong></label>
                <input type="text" id="datepicker" name="dobDate" class="form-control" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" placeholder="DD/MM/YY" value=<?php echo $dateofbirth ?>>
              </div>
              -->
        
              <div class="form-group col-md-6">
                <label>Entrer votre Date de naissance <strong class="required-fields">*</strong></label>
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            	  <input class="form-control" name="dobDate" id="registration-date" placeholder="dd/mm/yy"type="date">
              </div>
              
              
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Mot de passe <strong class="required-fields">*</strong></label>
                  <!-- <a name="generator" class="btn btn-dark btn-sm">Créer un mot de passe</a><br><br> -->
                  <input type="password" name="password" id="password-2" title=""  class="form-control" placeholder="*******">

              </div>
              <div class="form-group col-md-6">
                <label>Confirmez le mot de passe <strong class="required-fields">*</strong></label>
                <input id="password-3" type="password" title="" name="confirm" required class="form-control" id="inputEmail4" placeholder="*******">
              </div>

            </div>
            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
            <input type="hidden" name="action" value="validate_captcha"> 




           <div class="row  pl-3">

              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" title="" required>
                  <label class="form-check-label" for="invalidCheck2">
                    <small>En cliquant sur Soumettre, vous acceptez nos conditions générales, notre accord de visiteur et notre politique de confidentialité.</small>
                  </label>
                </div>
              </div>


            </div>
              
              
     <div class="row pl-3">
              <div class="form-group">
                <button type="submit" name='submit' class="btn btn-warning">Confirmer l'inscription</button>
                &nbsp;
                <a href="../../" class="btn btn-danger">Annuler</a> &nbsp;
                <!-- <a href="./" class="btn btn-dark">Retour à la page de connexion</a> -->
              </div>

            </div>
          </form>
<!--
        <div class="col-md-4 py-5 bg-dark text-white text-center d-block d-md-none">
          <div class=" ">
            <div class="card-body">
              <img src="../assets/images/logo/logo-mini(SVG).svg" style="width:50%">
              <h2 class="py-3" style="color: #ffa200;">Just Between Us</h2>
              <p>Créez votre compte avec JBU. C'est facile! . Tous les champs avec une étoile rouge (*) sont obligatoires. L'e-mail que vous fournissez sera utilisé par notre équipe pour vous envoyer des mises à jour récentes de notre part.

              </p>
            </div>
          </div>
        </div>
-->

      </div>
    </div>
  </section>
  <?php
  require_once '../includes/registrator_js.inc.php';
  ?>
  </body>
  <script>
    grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
        grecaptcha.execute('6LdsU80ZAAAAAAOfzo6UfiXpUkn4C-TZUjz7Pq_J', {action:'validate_captcha'})
                  .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>
  
  


</html>