<?php
// server services
include_once './memberpages/server.inc.php'; 
$claim=unhash($_GET['claim']);
$tour=unhash($_GET['tour']);
$tourDate=$_GET['tourDate'];
$ass=unhash($_GET['ass']);
$sender=unhash($_GET['sender']);

$selectmytour=select('*','member_association',"member_id ='$id' and association_id=$ass");
foreach($selectmytour as $myTourData ) {
    $mytour=$myTourData['ownedTour_number'];
    $mytourDate=$myTourData['ownedTour_date'];
}

update('member_association','ownedTour_number=:ownedTour_number,ownedTour_date=:ownedTour_date',"member_id='$id'",['ownedTour_number'=>$tour,'ownedTour_date'=>$tourDate,]);
update('member_association','ownedTour_number=:ownedTour_number,ownedTour_date=:ownedTour_date',"member_id='$sender'",['ownedTour_number'=>$mytour,'ownedTour_date'=>$mytourDate,]);
//swapping 
update('claim','status=:status',"claim_id='$claim'",['status'=>0,]);
//accepting claim by  changing status to 0

header("location:claims");

?>