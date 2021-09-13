<?php
// server services
include_once './memberpages/server.inc.php'; 
$claim=unhash($_GET['claim']);

update('claim','status=:status',"claim_id='$claim'",['status'=>2,]);
//after rejection
header("location:claims");

?>