<?php

// REPORTING THE GROUP 

if (isset($_POST['reportage'])) {
    # GATHERING USER FIELDS...
    @$reasonfor      = escape($_POST['assoc_reason']);
    @$specifyMessage = escape($_POST['assoc_specific']);
    #query to avoud reports duplicate
    $dupli = select("*","reported_group","report_type='$reasonfor' AND descrption='$specifyMessage' AND ma_id='$memberAssoc_id'");
    # QUERY INSERT
    $reportInsert = "INSERT INTO `reported_group`(`reported_id`, `report_type`, `descrption`, `report_date`, `ma_id`, `status`) VALUES(:repo_id,:repo_type,:repo_desc,NOW(),:repo_ma,:repo_status)"; 
    $pdoStatement = $GLOBALS['dbConnection']->prepare($reportInsert);

    # FORM VALIDATION
    if (empty($reasonfor) || empty($specifyMessage)) {
        # code...
        echo "<script type='text/javascript'> alert('Erreur: certains champs sont vides. Revérifiez votre formulaire')</script>";
    
      }
    elseif ($dupli) {
      # code...
      echo "<script type='text/javascript'> alert('Erreur: Ce rapport nous a déjà été envoyé.Si nous nous trompons, veuillez nous contacter')</script>";
    }
    else {
      // echo "<script type='text/javascript'> alert('Succès: votre rapport a été envoyé à l'administration. Nous vous informerons bientôt')</script>";
    $successMsg = "<div class='card card-inverse-success' id='context-menu-access'>"."<div class='card-body'>"."<p class='card-text'>"."<h4>"."Votre rapport a été envoyé"."</h4>"."</p>"."</div>"."</div>"."<br><br>";

    $pdoStatement ->execute(['repo_id'=>NULL,'repo_type'=>$reasonfor,'repo_desc'=>$specifyMessage,'repo_ma'=>$memberAssoc_id,'repo_status'=>'1']);

    }
}