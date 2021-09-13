<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ekibina/server/core/init.php';



class association

{



    public $name;

    public $max_member;

    public $amount;

    public $date_of_start;

    public $time_frame;

    public $currency;

    public $description;



    function __construct($name = null, $max_member = null, $amount = null, $date_of_start = null, $time_frame = null, $currency = null, $description = null)

    {

        $this->name = escape($name);

        $this->max_member = escape($max_member);

        $this->amount = escape($amount);

        $this->date_of_start = escape($date_of_start);

        $this->time_frame = escape($time_frame);

        $this->currency = escape($currency);

        $this->description = escape($description);

    }



    function create_association()

    {

        $token = verificationToken();

        $validate = CreateAssociationValdation($this->name, $this->max_member, $this->amount, $this->date_of_start, $this->description);

        $date = date('Y-m-d');

        //  validation of creating association

        if ($validate == NULL)

        {

            $data = ['association_name' => $this->name, 'created_date' => $date, 'max_member' => $this->max_member, 'amount' => $this->amount, 'date_to_start' => $this->date_of_start, 'time_frame' => $this->time_frame, 'description' => $this->description, 'currency_id' => $this->currency, 'status' => '1', 'groupToken' => $token,



            ];



            //$data array will store data to be inserted

            $dataStructure = 'association_name,created_date,max_member,amount,date_to_start,time_frame,description,Currency_id,status,groupToken';



            //$dataStructure will hold datastructure of table

            $values = ':association_name, :created_date, :max_member,:amount,:date_to_start,:time_frame,:description,:currency_id,:status,:groupToken';



            insert('association', $dataStructure, $values, $data);



            //start of section for sending mail to verify signed up user

            return $token;



        }

        else

        {

            foreach ($validate as $each)

            {

                echo $each;

            }

        }



    }



    function generate_tour($association)

    {



        $activateAssociation = update('association', 'status=:status', "association_id='$association'", ['status' => 0, ]);

        //activate association

        $numberOfMember = countAffectedRows('member_association', "association_id='$association' and status=1");

        //count all active member in association

        $min = 1;

        //minimum number to be generated randomly

        $max = $numberOfMember;

        //maximum number to be generated

        $members = select('member_id', 'member_association', "association_id='$association' and status=1");

        //selection of all active member in association

        foreach ($members as $member)

        {

            $memberId = $member['member_id'];

            $result = true;

            while ($result)

            {

                echo $tourNumber = rand($min, $max);

                $verify = countAffectedRows("member_association", "association_id='$association' and status=3 and ownedTour_number='$tourNumber'");

                //verify if tour nummber doesn`t already exist in association

                if ($verify == 0)

                {

                    update('member_association', 'status=:status,ownedTour_number=:ownedTour_number', "member_id=$memberId and association_id='$association' ", ['status' => 3, 'ownedTour_number' => $tourNumber, ]);

                    break;



                }



            }



        }

           #start line of adding tour 

        $data = ['association_id' => $association, 'numberOf_tour' => $numberOfMember, 'current_tour' =>1, 'status' =>0,];



            //$data array will store data to be inserted

            $dataStructure = 'association_id,numberOf_tour,current_tour,status';



            //$dataStructure will hold datastructure of table

            $values = ':association_id, :numberOf_tour, :current_tour,:status';



            insert('tour', $dataStructure, $values, $data);

            #end line of tour 

            



        



        

        



    }



    function generate_date($association)

    { 

      $alldate_of_start = select('*', 'association',"association_id ='$association'");

      foreach($alldate_of_start as $date_of_start ) $date_of_start =$date_of_start['date_to_start'];

      //selection of single association date to start its operation

      $associationMembers =select('*','member_association',"association_id = '$association' ORDER BY `ownedTour_number` ASC");

      //selection of all member association order by associated tour number

      foreach($associationMembers as $associationMember){

          $ownedTourNumber=$associationMember['ownedTour_number'];

          $maid=$associationMember['ma_id'];

          if($ownedTourNumber==1){

              $ownedTourDate=date('m/d/Y',strtotime('+ 30 days',strtotime($date_of_start)));

          }else{

            $ownedTourDate=date('m/d/Y',strtotime('+ 30 days',strtotime($ownedTourDate)));



          }

          update('member_association','ownedTour_date=:ownedTour_date',"ma_id='$maid'",['ownedTour_date'=>$ownedTourDate,]);

          //set date for receiving money(tourdate) to each members

      }



    }

    function update_tour($association)

    {   

         //selection of tour data 

        $selectionTour=select('*','tour',"association_id='$association'");

        foreach($selectionTour as $tour){

            $currentTour=$tour['current_tour'];

            $totalTour=$tour['numberOf_tour'];

        }

        if($currentTour!=$totalTour){

            $currentTour=+1;

            //increment current tour of association

            update('tour','current_tour=:current_tour',"association_id='$association'",['current_tour'=>$currentTour,]);



        }

        else {

            //deativate tour for association

            update('tour','status=:status',"association_id='$association'",['status'=>1,]);

            //deactive association as its finish its operation

            update('association','status=:status',"association_id='$association'",['status'=>3,]);



        }

    }



}



?>

