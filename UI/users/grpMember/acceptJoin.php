<?php 
// server services
include_once './memberpages/server.inc.php'; 
$mid=unhash($_GET['mid']);
$token=unhash($_GET['token']);
$rows=select("association_id",'association',"groupToken='$token'");
foreach ($rows as $row) $association=$row['association_id'];
//fetch association id
$tour = countAffectedRows('member_association',"`association_id` ='$association' AND status=1");
$tour++;
//$tour will hold tour number for each client based on first come first served
update('member_association','status=:status,ownedTour_number=:ownedTour_number',"ma_id='$mid'",['status'=>1,'ownedTour_number'=>$tour,]);
header("location:singleAssoc?requesteddemo=".actor($token));

?>