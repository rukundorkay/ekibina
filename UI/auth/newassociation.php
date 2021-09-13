<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<title>Create new association</title>

	<!-- Mobile Specific Metas -->

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Font-->

	<link rel="stylesheet" type="text/css" href="../assets/css/newassociation/opensans-font.css">

	<link rel="stylesheet" type="text/css" href="../assets/fonts/assocregisterfonts/line-awesome/css/line-awesome.min.css">

	<!-- Jquery -->

	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

	<!-- Main Style Css -->
require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server
	<link rel="stylesheet" href="../assets/css/newassociation/style.css"/>



	

<?php



// disabling right click



include_once '../includes/disableright.inc.php';



// top bar loading

include_once '../includes/topbarloading.inc.php';

//add server side services

require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');

if(isset($_POST['submit'])){

	$name= $_POST['associationName'];

	$description = $_POST['description'];

	$maximum=$_POST['maximuMembers'];

	$currency=$_POST['currency'];

	$amount=$_POST['amount'];

	$frame=$_POST['timeFrame'];

	$startingDate=$_POST['startingDate'];

	$ass = new association($name,$maximum,$amount,$startingDate,$frame,$currency,$description);

    $ass->create_association();

}



?>

</head>

<body class="form-v4">

	<div class="page-content">

		<div class="form-v4-content">

			<div class="form-left">

				<h2 class="important-info">Terms And Conditions</h2>

				<p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>

				<p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.</p>

				<div class="form-left-last">

					<input type="submit" name="account" class="account" value="Have An Account ?">

				</div>

			</div>

			<form class="form-detail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="myform" autocomplete="off">

				<h2>Let's Create Your Association</h2>



				<div class="form-row">

					<label for="your_email">Association Name <strong class="required-fields">*</strong> </label>

					<input type="text" name="associationName" id="your_email" class="input-text" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" >

				</div>



				<div class="form-row">

					<label for="your_email">Association Description</label>

					<input type="text" name="associationDescription" maxlength="" id="your_email" class="input-text" required pattern="" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false">

				</div>





				<div class="form-group">

					<div class="form-row form-row-1">

						<label for="first_name">Maximum Members <strong class="required-fields">*</strong></label>

						<input type="number" pattern="[0-9]+" min="0" max="30" name="maximuMembers" id="first_name" class="input-text" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false">

					</div>

					<div class="form-row form-row-1">

						<label for="last_name">Currency <strong class="required-fields">*</strong></label>



						<select name="currency" id="" class="input-text" required>



						<option selected disabled>Select Your Currency</option>

						<option value="1"> USD</option>

						<option value="2"> EUR</option>

						<option value="3"> RWF</option>



						</select>

					</div>

				</div>

				

				<div class="form-group">

					<div class="form-row form-row-1 ">

						<label for="">Amount to be paid  <strong class="required-fields">*</strong></label>

						<input type="text" name="amount"  class="input-text" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false">

					</div>

					<div class="form-row form-row-1">

						<label for="">Time Frame  <strong class="required-fields">*</strong></label>

						<select name="Timeframe" id="last_name" class="input-text">



						   <option selected disabled>Choose your Time frame</option>



							<option value="1"> Weekly</option>

							<option value="2"> Monthly</option>

							<option value="3"> Yearly</option>





</select>

					</div>

				</div>



				<div class="form-group">

					<div class="form-row form-row-1 ">

						<label for="password">Date of starting  <strong class="required-fields">*</strong></label>

						<input type="password" name="startingDate" id="password" class="input-text" required onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false">

					</div>

				

				</div>





				<div class="form-checkbox">

					<label class="container"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>

					  	<input type="checkbox" name="checkbox">

					  	<span class="checkmark"></span>

					</label>

				</div>

				<div class="form-row-last">

					<input type="submit" name="register" class="register" value="Register">

				</div>

			</form>

		</div>

	</div>



	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

	<script>

		// just for the demos, avoids form submit

		jQuery.validator.setDefaults({

		  	debug: true,

		  	success:  function(label){

        		label.attr('id', 'valid');

   		 	},

		});

		$( "#myform" ).validate({

		  	rules: {

			    password: "required",

		    	comfirm_password: {

		      		equalTo: "#password"

		    	}

		  	},

		  	messages: {

		  		first_name: {

		  			required: "Please enter a firstname"

		  		},

		  		last_name: {

		  			required: "Please enter a lastname"

		  		},

		  		your_email: {

		  			required: "Association Name can not be empty"

		  		},

		  		password: {

	  				required: "Please enter a password"

		  		},

		  		comfirm_password: {

		  			required: "Please enter a password",

		      		equalTo: "Wrong Password"

		    	}

		  	}

		});

	</script>

</body>

</html>