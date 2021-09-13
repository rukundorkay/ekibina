<?php
//require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server
require_once $_SERVER['DOCUMENT_ROOT'] .'/ekibina/server/core/init.php';

session_start();



function create_session($id, $token){

    //create session

    $_SESSION[strval(config::get('session/session_name')) ] = $id;

    $_SESSION[strval(config::get('session/token_name')) ] = $token;



}



function destroy_session(){

    // remove all session variables

    session_unset();



    // destroy the session

    session_destroy();

}



?>

