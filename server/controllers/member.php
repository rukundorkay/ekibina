<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';
class member {
  public $fname;
  public $lname;
  public $password;
  public $email;

//escape() are used as sanitizer

  function __construct($fname=null,$lname=null,$email=null,$password=null,$dateofbirth=null, $phonenumber=null, $country=null) {
    $this->fname = escape($fname);
    $this->lname = escape($lname);
    $this->password = escape($password);
    $this->email= escape($email);
    $this->phonenumber= escape($phonenumber);
    $this->dateofbirth= escape($dateofbirth);
    $this->country= escape($country);
    
  }

   function signup()
    {

        $validate = memberSignUpValdation($this->fname, $this->lname, $this->password, $this->email);

        //signup validation: $validate will hold null if there is no error in validation
        if ($validate === NULL)
        {

            $hashedpassword = create_hash($this->password);

            //this will hash password
            $affectedRow = countAffectedRows('user_member', "email= '$this->email'");

            //$affectedRow will verify if email is already registerd
            

            if ($affectedRow == 0)
            {

                $token = verificationToken();

                //this token sent to user
                $data = ['first_name' => $this->fname, 'last_name' => $this->lname, 'email' => $this->email, 'password' => $hashedpassword, 'status' => '1', 'token' => $token, 'member_profile' => 'default_avatar.png','phone_number'=>$this->phonenumber,
                        'date_of_birth'=>$this->dateofbirth,'stripe_id'=>0,'stripe_onboarding'=>0 ,'country_id'=>$this->country,

                ];

                //$data array will store data to be inserted
                $dataStructure = 'first_name,last_name, email,password,status,token,member_profile,joinin_date,phone_number,date_of_birth,stripe_id,stripe_onboarding,country_id';

                //$dataStructure will hold datastructure of table
                $values = ':first_name, :last_name, :email,:password,:status,:token,:member_profile,NOW(),:phone_number,:date_of_birth,:stripe_id,:stripe_onboarding,:country_id';

                insert('user_member', $dataStructure, $values, $data);
                $email =explode("@",$this->email);
                $emailP1=$email[0];
                $emailP2=$email[1];

                //start of section for sending mail to verify signed up user
                echo '<script type="text/javascript">window.location =("account_verification?data=' .actor($emailP2) . '&&state='.actor($emailP1). '&&nextdata='. actor($this->country) .' ")</script>';
                myemail($this->email, $token);

                //end of section
                return true;

            }
            else return false;

        }
        else foreach ($validate as $each)
        {
            echo $each;

            //validation error
            
        }

    }


function verifyEmail($token,$email,$country)
    {

        $token = escape($token);
        $count = countAffectedRows('user_member', "token = '$token' and status=1 and email='$email'");
        

        $countries = select('*','country',"country_id='$country'");
        foreach($countries as $country){
          $country=$country['short_name'];
        }
        
        

        //$count will hold 1 if that token exists
        if ($count == 1)
        {
          $stripeId=createExpressAccount($country,$email);
            update('user_member', 'status=:status,stripe_id=:stripe_id', "token = '$token'", ['status' => 0,'stripe_id'=> $stripeId, ]);
            return true;
        }

        return false;

    }


  function signin($email,$password,$token){
    
    $email=escape($email);
    $password=escape($password);

    $count=countAffectedRows('user_member',"email='$email'");
    if($count==1){
    
      //from here we are sure that email are registered
     
     $rows=select('*','user_member',"email='$email' and status = 0 ");
      
    foreach($rows as $row) $hash=$row['password'];

      //selection of hashed password stored in db

    foreach($rows as $row) $id=$row['member_id'];


    $log=verify_password($password,$hash);
    if($log){
      create_session($id,$token);
     return true;
      } else 
      return false;
    
    
      


    }

  }
function logout(){
  destroy_session();
  return true;//
}


  function joinassociation($member,$membertype,$association,$status){
    $count = countAffectedRows('member_association',"member_id='$member' AND `association_id` ='$association' and status=1");
    
    if($count!=0){
      return false;
    }else{
      
      $data = [
        'member_id' =>$member,
        'memberType_id' =>$membertype,
        'association_id' => $association,
        'ownedTour_number' =>1,
         'ownedTour_date' =>date('Y-m-d'),
         'date'=>date('Y-m-d'),
        'status'=>$status,
        
      
      ];

      //$data array will store data to be inserted

      $dataStructure='member_id,memberType_id,association_id,ownedTour_number,ownedTour_date,date,status';

      //$dataStructure will hold datastructure of table

      $values=':member_id, :memberType_id, :association_id,:ownedTour_number,:ownedTour_date,:date,:status';

      insert('member_association',$dataStructure,$values,$data);
     return true;
    }


  }

  function resetpassword($email){
    //resetpassword will recover lost password
    $email=escape($email);
    $count=countAffectedRows('user_member',"email='$email'");

    if($count!=1) return false;
    else{
      $token=verificationToken();
      $row=select('*','user_member',"email='$email'");
      //selection of member id whom belongs to email provided
      foreach($row as $member) { $member=$member['member_id']; }
      
   $data = [
        'token' =>$token,
        'member_id' =>$member,
        'status'=>'1',
        ];

      //$data array will store data to be inserted

      $dataStructure='token,member_id,status';

      //$dataStructure will hold datastructure of table

      $values=':token,:member_id,:satatus';

     update('verification_token','status=:status',"member_id='$member'",['status'=>0,]);
     //this will expire all token belong to member befor sending other

     insert('verification_token',$dataStructure,$values,$data);
      $resetlink="jausolutions.com/justbetweenus project/UI/auth/resetPass?token=".$token;
      $emailArray=explode("@",$email);
      $emailUser=actor($emailArray['0']);
      $emailDomain=actor($emailArray['1']);
      header("location:emailSent?user=$emailUser&&domain=$emailDomain");
      resetpasswordmail($email,$resetlink);
      //resetpasswordmail() will send mail with token to reset password
      return true;
      
    }



  }
 
  function newpassword($password,$token){
    $password=escape($password);
    $token=escape($token);
    $validate=resetpasswordValdation($password);
    //validate password
    if($validate==null){
    $hashedpassword=create_hash($password);
    //hashing new password
     $count=countAffectedRows('verification_token',"token='$token' and status='1'");
     
    if($count==1){
    $rows=select('*','verification_token',"token='$token' and status='1'");
    foreach($rows as $row) $member=$row['member_id'];
    update('user_member','password=:password',"member_id='$member'",['password'=>$hashedpassword,]);
    update('verification_token','status=:status',"token='$token'",['status'=>0,]);

    return true;

  }else return false;
}
  }
  //newpassord its for lost password


  function changepassword($password,$member){
    $password=escape($password);
    
    $validate=resetpasswordValdation($password);
    //validate password
    if($validate==null){
    $hashedpassword=create_hash($password);
    //hashing new password
     ;
    update('user_member','password=:password',"member_id='$member'",['password'=>$hashedpassword,]);
    

    return true;

  
}
  }



function claim($sender,$receiver,$email,$assname,$senderFname,$senderLname,$receiverFname,$receiverLname,$token){
    $count=countAffectedRows('`claim`',"receiver_id = '$receiver' and sender_id = '$sender' and status=1");
    if($count>0)return false;
    else{
      $data = [
        'receiver_id' =>$receiver,
        'sender_id' =>$sender,
        'status'=>1,
        ];

      //$data array will store data to be inserted

      $dataStructure='receiver_id,sender_id,status';

      //$dataStructure will hold datastructure of table

      $values=':receiver_id,:sender_id,:status';

      insert('`claim`',$dataStructure,$values,$data);
      @$one=base64_encode(urlencode(md5 ($hashsalt)));
      $token=base64_encode(urlencode(($token)));
      @$tree=base64_encode(urlencode(md5 ($hashsalt2)));
      echo '<script type="text/javascript">window.location =("singleAssoc?requestajaxhiddenId='.$one.'&&requesteddemo='.$token.'&&selectedproduct='.$tree.'")</script>';

      
      //claimRequest will sends email include claim request letter

      claimRequest($email,$assname,$senderFname,$senderLname,$receiverFname,$receiverLname);

    
    return true;


  } 
}



}


?>