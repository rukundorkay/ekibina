<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';

class admin

{

    function signin($email,$password,$token)



        {

    

        $email=escape($email);

        $password=escape($password);

    

        $count=countAffectedRows('admin',"email='$email'");

        if($count==1){

        

          //from here we are sure that email are registered

         

         $rows=select('*','admin',"email='$email' and status = 0 ");

          

        foreach($rows as $row) $hash=$row['password'];

    

          //selection of hashed password stored in db

    

        foreach($rows as $row) $id=$row['admin_id'];

    

    

        $log=verify_password($password,$hash);

        if($log){

          create_session($id,$token);

         return true;

          } else 

          return false;

        

        

          

    

    

        }

    

      }





    function resetpassword($email)



         {

        //resetpassword will recover lost password

        $email=escape($email);

        $count=countAffectedRows('admin',"email='$email'");

    

        if($count!=1) return false;

        else{

          $token=verificationToken();

          $row=select('*','admin',"email='$email'");

          //selection of admin id whom belongs to email provided

          foreach($row as $admin) { $admin=$admin['admin_id']; }

          

       $data = [

            'token' =>$token,

            'admin_id' =>$admin,

            'status'=>'1',

            ];

    

          //$data array will store data to be inserted

    

          $dataStructure='token,admin_id,status';

    

          //$dataStructure will hold datastructure of table

    

          $values=':token,:admin_id,:satatus';

    

         update('verification_token','status=:status',"admin_id='$admin'",['status'=>0,]);

         //this will expire all token belong to admin befor sending other

    

         insert('verification_token',$dataStructure,$values,$data);

          $resetlink="localhost/justbetweenus/UI/users/superAdmin/memberpages/resetPass?token=".$token;

          header("location:emailSent?email=$email");

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

        foreach($rows as $row) $admin=$row['member_id'];

        update('admin','password=:password',"admin_id='$admin'",['password'=>$hashedpassword,]);

        update('verification_token','status=:status',"token='$token'",['status'=>0,]);

    

        return true;

    

      }else return false;

    }

      }

      //newpassord its for lost password





    }#end of admin class









?>