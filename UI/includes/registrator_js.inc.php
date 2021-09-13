<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5f7c9b124704467e89f52bac/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script> 
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
 <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
 <script>
   $(document).ready(function() {
     //var today = new Date();
     var today = '12/12/2004';
     $('#datepicker').datepicker({
       format: 'dd/mm/yyyy',
       uiLibrary: 'bootstrap4',
       autoclose: true,
       endDate: "31/12/2004",
       maxDate: today
     }).on('changeDate', function(ev) {
       $(this).datepicker('hide');
     });


     $('#datepicker').keyup(function() {
       if (this.value.match(/[^0-9]/g)) {
         this.value = this.value.replace(/[^0-9^-]/g, '');
       }
     });
   });
 </script>

<script src="../assets/showpass/hideShowPassword.min.js"></script>
  <script>
    // Example 1:
    // - Password hidden by default
    // - Inner toggle shown
    $('#password-1').hidePassword(true);

    // Example 2:
    // - Password shown by default
    // - Toggle shown on 'focus' of element
    // - Custom toggle class
    $('#password-2').showPassword('focus', {
      toggle: {
        className: 'my-toggle'
      }
    });
    $('#password-3').showPassword('focus', {
      toggle: {
        className: 'my-toggle'
      }
    });

    // Example 3:
    // - When checkbox changes, toggle password
    //   visibility based on its 'checked' property
    $('#show-password').change(function() {
      $('#password-3').hideShowPassword($(this).prop('checked'));
    });
  </script>


 <script src="build/js/intlTelInput.js"></script>
 
 <script>
  var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      allowDropdown: true,
      autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      initialCountry: "fr",
      // localizedCountries: { 'de': 'Deutschland' },
      nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      placeholderNumberType: "MOBILE",
      preferredCountries: ['us','fr','be','ca','au','it','pl','de','es',''],
      separateDialCode: true,
     utilsScript: "build/js/utils.js",
   });
 </script>

 <!-- Javascript -->
 <script>
   $(function() {
     $("#fnaming").tooltip({
         content: "<strong>Votre prénom doit comporter au moins 3 caractères et ne doit pas inclure de chiffres.</strong>",
         track: true
       }),
       $("#lnaming").tooltip({
         content: "<strong>Votre nom doit comporter au moins 3 caractères et ne doit pas inclure de chiffres.</strong>",
         track: true
       }),
       $("#emailing").tooltip({
         content: "<strong>entrez une adresse e-mail valide.</strong>",
         track: true
       }),
       $("#autocomplete").tooltip({
         content: "<strong>Entrez votre adresse.</strong>",
         track: true
       }),
       $("#phone").tooltip({
         content: "<strong>Sélectionnez votre code de pays et saisissez votre numéro de téléphone.</strong>",
         track: true
       }),
       $("#datepicker").tooltip({
         content: "<strong>Choisissez votre date de naissance. Le format est jour / mois / année [jj / mm / aa].</strong>",
         track: true
       }),
       $("#password-2").tooltip({
         content: "<strong>votre mot de passe doit contenir un caractère majuscule, des caractères numériques et un caractère spécial.</strong>",
         track: true
       }),
       $("#password-3").tooltip({
         content: "<strong>Répétez le mot de passe.</strong>",
         track: true
       }),
       $("#invalidCheck2").tooltip({
         content: "<strong>Avant de vous inscrire, veuillez accepter nos conditions générales et notre politique de confidentialité.</strong>",
         track: true
       }),
       $("#tooltip-4").tooltip({
         disabled: true
       });
   });
 </script>

 <script>
   $(function() {
     $("#tooltip-1").tooltip();
     $("#tooltip-2").tooltip();
   });
 </script>

 <script>
   var password = document.getElementById("password-2"),
     confirm_password = document.getElementById("password-3");

   function validatePassword() {
     if (password.value != confirm_password.value) {
       confirm_password.setCustomValidity("Mots de passe ne correspondent pas");
     } else {
       confirm_password.setCustomValidity('');
     }
   }

   password.onchange = validatePassword;
   confirm_password.onkeyup = validatePassword;
 </script>