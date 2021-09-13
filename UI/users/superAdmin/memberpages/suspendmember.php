<?php
include_once 'includes/server.inc.php';
$adminId=unhash($_GET['member']);
$suspend = update('user_member',"status=:memberstatus","member_id='$adminId'",['memberstatus'=>3]);
header("location:assocList");