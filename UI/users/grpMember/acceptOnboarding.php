<?php 
// server services
include_once './memberpages/server.inc.php'; 
update('user_member','stripe_onboarding=:stripe_onboarding',"member_id='$id'",['stripe_onboarding'=>1,]);
header("location:index");

?>