<?php
include_once 'includes/server.inc.php';
$adminId=unhash($_GET['association']);
$suspend = update('association',"status=:assocstatus","association_id='$adminId'",['assocstatus'=>2]);
header("location:assocList");
