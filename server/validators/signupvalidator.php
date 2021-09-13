<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
require ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/helpers/validationhandler/vendor/autoload.php');


use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

function memberSignUpValdation($fname,$lname,$password,$email){
    $results=NULL;
    //this variable will hold results of validation 
    $fnameValidator = v::alnum()->length(3, null)->setName('first name');;
    $fnameValidator->validate($fname); // true

    //validation for firstname

    $lnameValidator = v::alnum()->length(3, null)->setName('last name');;
    $lnameValidator->validate($lname); // true
   
    //validation for lname

    $emailValidator = v::email();
    $emailValidator->validate($email); // true

    // validation for email

    $passwordValidator = v::noWhitespace()->length(6, null)->regex('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{6,}$/')->setName('Password');;
    $passwordValidator->validate($password); // true
    // password validation
    
   
    try {
        $fnameValidator->assert($fname);
    } catch(NestedValidationException $exception) {
       $results=$exception->getMessages();
    }
    try {
        $lnameValidator->assert($lname);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }
    try {
        $emailValidator->assert($email);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }
    try {
        $passwordValidator->assert($password);
    } catch(NestedValidationException $exception) {
        $results=$exception->getMessages();
    }

    return $results;
}
 

?>