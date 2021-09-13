<?php


require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server
//add server side services

require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');

$id=$_SESSION[config::get("session/session_name")];

$token=$_SESSION[config::get("session/token_name")];



if(!$id){

  header("location:login");

}



?>