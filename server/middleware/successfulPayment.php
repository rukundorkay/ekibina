<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
function handleSuccessfulPaymentIntent($paymentIntent) {
    // Fulfill the purchase.
    update('payment','status=:status',"stripe_paymentId='$paymentIntent'",['status'=>0,]);
    //selection of sender info
  $data='first_name,last_name,email,association_name,payment.amount,payment.fees,symbol';
  $data1='first_name,last_name,email,association_name,payment.amount,payment.fees';
  $selectionOfsenderInfo=select($data,'payment,user_member,association,member_association,currency',"currency.currency_id=association.currency_id and user_member.member_id=member_association.member_id and association.association_id = member_association.association_id and payment.stripe_paymentId ='$paymentIntent' and payment.sender_id=member_association.ma_id");
  foreach($selectionOfsenderInfo as $senderInfo){
    $senderFname=$senderInfo['first_name'];
    $senderLname=$senderInfo['last_name'];
    $associationName=$senderInfo['association_name'];
    $senderEmail=$senderInfo['email'];
     $amount=$senderInfo['amount'];
    $fees=$senderInfo['fees'];
    $currency=$senderInfo['symbol'];
    $amount=$amount-$fees;

  }
    //selection of receiver info
  $selectionOfreceiverInfo=select($data1,'payment,user_member,association,member_association',"user_member.member_id=member_association.member_id and association.association_id = member_association.association_id and payment.stripe_paymentId ='$paymentIntent' and payment.ma_id=member_association.ma_id ");
  foreach($selectionOfreceiverInfo as $receiverInfo){
    $receiverFname=$receiverInfo['first_name'];
    $receiverLname=$receiverInfo['last_name'];
    $receiverEmail=$receiverInfo['email'];
  }
  
  //send payment email 
  
  senderPaymentMail($senderFname,$senderLname,$associationName,$senderEmail,$receiverFname,$receiverLname,$paymentIntent,$amount,$currency);
  
  //receiver payment email
  
 receiverPaymentMail($senderFname,$senderLname,$associationName,$senderEmail,$receiverFname,$receiverLname,$paymentIntent,$amount,$currency,$receiverEmail);
  
  
  
  
  };





?>