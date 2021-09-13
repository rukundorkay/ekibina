<div class="col-12 d-none d-md-block" <?php echo$disable;?> >
              <div class="card card-statistics">
                <div class="card-body" id="statistics">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-users mr-2"></i>
                          Mes Associations
                        </p>
                        <h2><?php echo $numberOfAssociation?></h2><br>
                        <a href="myAssocs" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i> Afficher la liste</a>                     
                        
                        <!-- <label class="badge badge-outline-success badge-pill">2.7% increase</label>  -->
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Ma contribution
                        </p>
                        <h6> $<?php echo amountSent($id,'1'); ?></h6>
                        <h6> &#128;<?php echo amountSent($id,'2'); ?></h6>
                        <h6> &#163;<?php echo amountSent($id,'3'); ?></h6>
                        <br>
                        <a href="transactions" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i> Voir l'historique</a>
                        <!-- <label class="badge badge-outline-danger badge-pill">30% Increase</label> -->
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                          Total reçu
                        </p>
                        <h6> $<?php echo amountReceived($id,'1'); ?></h6>
                        <h6> &#128;<?php echo amountReceived($id,'2'); ?></h6>
                        <h6> &#163;<?php echo amountReceived($id,'3'); ?></h6><br>
                        <a href="transactions" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i> Voir l'historique</a>
                        <!-- <label class="badge badge-outline-success badge-pill">12% increase</label> -->
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Réclamations de tours
                        </p>
                        <h2><?php echo $countclaims; ?></h2><br>
                        <a href="claims" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i>Voir l'historique</a>
 <!-- <label class="badge badge-outline-success badge-pill">10% increase</label>  -->
                      </div>
                 
                  </div>
                </div>
              </div><br><br>
            </div>
            
            

            <!-- ========================================================================================= -->
            <?php if($numberOfAssociation!= 0){
           //selection of user data
           foreach($associations as $association){
             
          $associationtoken=$association['groupToken'];
          $membertype = $association['memberType_id'];
          $numberofmemberofassociation= countAffectedRows('member_association,association',"member_association.association_id = association.association_id and (member_association.status=1 or member_association.status=3 )and association.groupToken='$associationtoken'");
          
          ?>       
  
     
                <div class="col-md-4 grid-margin stretch-card"<?php echo$disable;?>>
                    <div class="card" id="carding">
                        <div class="card-body">
                            <div class="d-flex flex-row">
<img src="../../assets/images/svg/team.svg" class="img-lg rounded-circle mb-3" alt="">
                                <div class="ml-3">
                                    <h6 style="text-transform:capitalize;">
                                      
                                <?php echo mb_strimwidth($association['association_name'], 0, 25, "...");?>
                                 </h6>
                                    <p class="text-muted"><?php echo $numberofmemberofassociation;?> Membres</p>

                                    <a href="<?php if($assocstatus == 2){?>errorsuspended<?php } else{?>singleAssoc?requestajaxhiddenId=<?php echo base64_encode(urlencode(md5($hashsalt))); ?>&&requesteddemo=<?php echo base64_encode(urlencode(($association['groupToken']))); ?>&&selectedproduct=<?php echo base64_encode(urlencode(md5($hashsalt2)));} ?>
"><img src="../../assets/images/svg/next.svg" style="width: 30px;" alt=""> Aller à l'association</a>
                                    <!-- 
                                        <button type="button" class="btn btn-warning btn-icon-text">
                                            <i class="far fa-check-square btn-icon-prepend"></i>
                                            Aller à l'association
                                        </button> 
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }}
                
                else {
                ?>


          
          <div class="col-md-12 grid-margin">
            <div class="card card-inverse-danger" id="context-menu-access">
                <div class="card-body">
                  <h4 class="card-text">
                  Vous n'êtes inscrit dans aucune association
                  </h4>
                </div>
              </div>
            </div>
          
    

                <?php } ?>
    


            <!-- ========================================================================================= -->

<div class="col-12 d-block d-md-none" <?php echo$disable;?>>
<div class="card card-statistics">
                <div class="card-body" id="statistics">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-users mr-2"></i>
                          Mes Associations
                        </p>
                        <h2><?php echo $numberOfAssociation?></h2><br>
                        <a href="myAssocs" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i> Afficher la liste</a>                     
                        
                        <!-- <label class="badge badge-outline-success badge-pill">2.7% increase</label>  -->
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Ma contribution
                        </p>
                        <h6> $<?php echo amountSent($id,'1'); ?></h6>
                        <h6> &#128;<?php echo amountSent($id,'2'); ?></h6>
                        <h6> &#163;<?php echo amountSent($id,'3'); ?></h6>
                        <br>
                        <a href="transactions" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i> Voir l'historique</a>
                        <!-- <label class="badge badge-outline-danger badge-pill">30% Increase</label> -->
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                          Total reçu
                        </p>
                        <h6> $<?php echo amountReceived($id,'1'); ?></h6>
                        <h6> &#128;<?php echo amountReceived($id,'2'); ?></h6>
                        <h6> &#163;<?php echo amountReceived($id,'3'); ?></h6>
                        <br>
                        <a href="transactions" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i> Voir l'historique</a>
                        <!-- <label class="badge badge-outline-success badge-pill">12% increase</label> -->
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Réclamations de tours
                        </p>
                        <h2><?php echo $countclaims; ?></h2><br>
                        <a href="claims" class="btn-sm btn-warning"><i class="icon-sm fa fa-chevron-right mr-2"></i>Voir l'historique</a>
 <!-- <label class="badge badge-outline-success badge-pill">10% increase</label>  -->
                      </div>
                 
                  </div>
                </div>
              </div> <br><br>
            </div>