<?php 
//add server side services
require_once ($_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php');
$id=$_SESSION[config::get("session/session_name")];
$token=$_SESSION[config::get("session/token_name")];

if(!$id){
  header("location:../../auth/");
}
//number of assocition
$numberOfAssociation = countAffectedRows('member_association',"member_id='$id' and (status=1 or status=3)");

//line corrected by ivan to display member country
$rows = select('*', 'user_member,country', " `user_member`.`country_id`=`country`.`country_id` and `user_member`.`member_id`='$id'");
if($numberOfAssociation>0)

  $associations =select('*','`member_association`,`association`'," `member_association`.`member_id`= '$id' and `member_association`. association_id = `association`.association_id and (`member_association`.status=1 or `member_association`.status=3 )");

//selection of user data
foreach($rows as $row){
  $memberId= $row['member_id'];
  $fname=$row['first_name'];
  $lname=$row['last_name'];
  $stripeStatus=$row['stripe_onboarding'];
  $memberEmailAddress = $row['email'];
  $memberImage        = $row['member_profile'];
  $stripeId=$row['stripe_id'];
  //$assocName = $row['association_name'];
    //new lines added by ivan
    $memberjoin  = $row['joinin_date'];
    $memToken    = $row['token'];
    $countryId   = $row['country_id'];
    $countryName = $row['country_name']; 
    $countryCode = $row['short_name']; 

}
$countclaims=countAffectedRows('`claim`,`member_association`,`association`,user_member',"association.association_id = member_association.association_id and user_member.member_id= member_association.member_id and claim.receiver_id=member_association.ma_id and user_member.member_id='$id'  and claim.status=1");
$claims = select('*','`claim`,`member_association`,`association`,user_member',"association.association_id = member_association.association_id and user_member.member_id= member_association.member_id and claim.receiver_id=member_association.ma_id and  user_member.member_id = '$id' and claim.status=1");

//selection for all association where i am admmin
$selectionAdmin=select("*","user_member,association,member_association"," user_member.member_id = member_association.member_id and association.association_id = member_association.association_id  and user_member.member_id ='$id' and member_association.memberType_id=1");
$numberOfRequest=0;
foreach($selectionAdmin as $adminRow){
$associationId=$adminRow['association_id'];
//count of request in each association
$countRequest=countAffectedRows("user_member,association,member_association"," user_member.member_id = member_association.member_id and association.association_id = member_association.association_id  and association.association_id  ='$associationId' and member_association.status=0");
$numberOfRequest=$countRequest+$numberOfRequest;
}
//check wether account finished onboarding section
$disable =false;
if ($stripeStatus == 0){
 $disable=' style=" pointer-events:none; opacity:0.6;color:blue;"';
 $url=createAccountLink($stripeId);
  
}
//function to calculate total amount of user contribution
function amountSent($member,$currency){
  $selectionAmount=select('SUM(payment.amount) as sum','payment,user_member,association,currency,member_association',"member_association.association_id=association.association_id and user_member.member_id = member_association.member_id and association.currency_id = currency.currency_id and payment.sender_id=member_association.ma_id AND user_member.member_id='$member' and currency.currency_id='$currency' and payment.status=0");
    //selection of dollars
    foreach($selectionAmount as $amounts) $amount = $amounts['sum'];
    $selectionfees=select('SUM(payment.fees) as sum','payment,user_member,association,currency,member_association',"member_association.association_id=association.association_id and user_member.member_id = member_association.member_id and association.currency_id = currency.currency_id and payment.sender_id=member_association.ma_id AND user_member.member_id='$member' and currency.currency_id='$currency'and payment.status=0");
    foreach($selectionfees as $fees) $fee = $fees['sum'];
     return $currencyAmount=$amount-$fee;
    
  
  }
  //function to calculate total amount of total amount user received
  function amountReceived($member,$currency){
    $selectionAmount=select('SUM(payment.amount) as sum','payment,user_member,association,currency,member_association',"member_association.association_id=association.association_id and user_member.member_id = member_association.member_id and association.currency_id = currency.currency_id and payment.ma_id=member_association.ma_id AND user_member.member_id='$member' and currency.currency_id='$currency' and payment.status=0");
    //selection of dollars
    foreach($selectionAmount as $amounts) $amount = $amounts['sum'];
    $selectionfees=select('SUM(payment.fees) as sum','payment,user_member,association,currency,member_association',"member_association.association_id=association.association_id and user_member.member_id = member_association.member_id and association.currency_id = currency.currency_id and payment.ma_id=member_association.ma_id AND user_member.member_id='$member' and currency.currency_id='$currency'and payment.status=0");
    foreach($selectionfees as $fees) $fee = $fees['sum'];
     return $currencyAmount=$amount-$fee;
    
    }