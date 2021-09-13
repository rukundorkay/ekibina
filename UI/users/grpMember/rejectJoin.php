<?php
// server services
include_once './memberpages/server.inc.php'; 
$maid=unhash($_GET['maid']);
$token=unhash($_GET['token']);
update('member_association','status=:status',"ma_id='$maid'",['status'=>2,]);
//after rejection

header("location:assocRequests");
?>
