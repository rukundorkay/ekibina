<?php


require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server
//add server side services

require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');

$id=$_SESSION[config::get("session/session_name")];

$token=$_SESSION[config::get("session/token_name")];



if(!$id){

  header("location:login");

}



#fetch entered user



$enteredAdmins = select('*', 'admin', "admin_id='$id'");

// all associations selector



$allassociations = countAffectedRows('association', "groupToken!='shuis'");

$assocSelector   = countAffectedRows('association', "status='1'");

$assocSelector1  = countAffectedRows('association', "status='0'");

$assocSuspended  = countAffectedRows('association', "status='2'");

$assocterminated = countAffectedRows('association', "status='3'");

$memberselector  = countAffectedRows('user_member', "token!='0'");

$activemember    = countAffectedRows('user_member', "status='0'");

$pendingmember   = countAffectedRows('user_member', "status='1'");

$paymentselector = countAffectedRows('payment', "status!='5677'");

$completepayment = countAffectedRows('payment', "status='0'");

$uncompletepayment = countAffectedRows('payment', "status='1'");



// Payment transactions selector

$querySelect = select('symbol,payment.date,payment.status,user_member.first_name,user_member.last_name,association.association_name,association.association_id,payment.sender_id,payment.amount,payment.fees,payment.ma_id,payment.stripe_paymentId,member_association.ma_id,member_association.member_id,member_association.association_id', 'payment,member_association,association,user_member,currency'," payment.ma_id=member_association.ma_id and member_association.association_id=association.association_id and member_association.member_id=user_member.member_id and association.currency_id=currency.currency_id");



// REPORTED ASSOCIATIONS SELECTOR



$reportedselector = select('*', 'reported_group,user_member,association,member_association', "reported_group.ma_id = member_association.ma_id AND member_association.member_id=user_member.member_id AND member_association.association_id=association.association_id AND reported_group.reported_id");

$reportedCounter  = countAffectedRows('reported_group,user_member,association,member_association', "reported_group.ma_id = member_association.ma_id AND member_association.member_id=user_member.member_id AND member_association.association_id=association.association_id AND reported_group.reported_id");



#adminDatacounter

foreach ($enteredAdmins as $adminEnter) {

  # code...

$adminId   = $adminEnter['admin_id'];

$firstName = $adminEnter['first_name'];

$lastName  = $adminEnter['last_name'];

$adminMail = $adminEnter['email'];

$adminprofile = $adminEnter['admin_profile'];

}



?>