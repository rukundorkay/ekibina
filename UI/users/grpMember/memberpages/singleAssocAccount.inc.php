

                <div class="col-12 grid-margin">

                    <div class="card" style="border-radius: 0px;border-top:4px solid #444; ">

                    <div class="card-body">

                        <div class="d-md-flex justify-content-between align-items-center">

                        <div class="d-flex align-items-center mb-3 mb-md-0">

                        <img src="../../assets/images/svg/work.svg" style="width: 60px;" alt="">

                            <div class="ml-4">

                            <p class="mb-0">My tour position</p>

                            <h5 class="mb-0"><?php if(!$selectCurrentTour)echo"not genrated";else echo$myTour;?></h5>

                            </div>

                        </div>

                        <div class="d-flex align-items-center mb-3 mb-md-0">

                        <img src="../../assets/images/svg/group.svg" style="width: 60px;" alt="">

                            <div class="ml-4">

                            <p class="mb-0">Current position <?php echo @$currentTour?></p>

                            <h5 class="mb-0"><?php echo @$currentMemberFirstname.' '.@$currentMemberLastname;if(!$selectCurrentTour)echo"not genrated";?></h5>

                            </div>

                        </div>

                        <div class="d-flex align-items-center mb-3 mb-md-0">

                            <img src="../../assets/images/svg/money.svg" style="width: 60px;" alt="">

                            <div class="ml-4">

                            <h5 class="mb-0">My contribution</h5>

                            <p class="mb-0"><?php if($contribution)echo $contribution;else echo 0; echo' '.$symbol;?></p>

                            </div>

                        </div>

                        <div class="d-flex align-items-center">

                        <img src="../../assets/images/svg/team.svg" style="width: 60px;" alt="">

                            <div class="ml-4">

                            <p class="mb-0">Members</p>

                            <h5 class="mb-0"><?php echo $numberofmemberofassociation;?></h5>

                            </div>

                        </div>

                        </div>

                    </div>

                    </div>

                </div>