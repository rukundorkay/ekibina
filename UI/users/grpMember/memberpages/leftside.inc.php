<ul class="nav" <?php echo $disable;?> >
  <li class="nav-item nav-profile">
    <div class="nav-link">
      <a href="memberProfile">
        <div class="profile-image">

          <?php if ($memberImage == 'default_avatar.png') { ?>

            <img src="../member_pics/<?php echo $memberImage; ?>" alt="image" />

          <?php } else {
          ?>
            <img src="../member_pics/<?php echo $memToken . $memberImage; ?>" alt="image" />

          <?php } ?>
        </div>
      </a>
      <a href="memberProfile" style="text-decoration: none;">
        <div class="profile-name">
          <p class="name" style="text-transform: uppercase; ">
            <?php echo $fname; ?>
          </p>
          <p class="designation">
            <?php echo $lname; ?>
          </p>
        </div>
      </a>
    </div>
  </li>

  <li class="nav-item" id="linksid">
    <a class="nav-link" href="index">
      <img src="../../assets/images/svg/dashboard.svg" style="width: 30px;" alt="">
      &nbsp;
      <span class="menu-title">Dashboard</span>
    </a>
  </li>


  <li class="nav-item" id="linksid">
    <a class="nav-link" href="newAssoc">
      <img src="../../assets/images/svg/seo-and-web.svg" style="width: 30px;" alt="">
      &nbsp;
      <span class="menu-title">New associations</span>
    </a>
  </li>

  <li class="nav-item" id="linksid">
    <a class="nav-link" href="assocRequests">
      <img src="../../assets/images/svg/contact.svg" style="width: 30px;" alt="">
      &nbsp;
      <span class="menu-title">Association requests <div class="badge badge-pill badge-dark" id="badging"><?php echo $numberOfRequest ?></div></span>
    </a>
  </li>

  <li class="nav-item" id="linksid">
    <a class="nav-link" href="claims">
      <img src="../../assets/images/svg/cashback.svg" style="width: 30px;" alt="">
      &nbsp;
      <span class="menu-title">Complaints <div class="badge badge-pill badge-info" id="badging"><?php echo $countclaims; ?></div></span>
    </a>
  </li>


  <li class="nav-item d-lg-block">
    <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
      <img src="../../assets/images/svg/bank-statement.svg" style="width: 30px;" alt="">
      <span class="menu-title">Payments</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="sidebar-layouts">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="transactions">Transactions</a></li>
        <li class="nav-item"> <a class="nav-link" href="payouts">Payment setup</a></li>

      </ul>
    </div>
  </li>





  <li class="nav-item" id="main_assoc">
    <a class="nav-link" href="myAssocs">
      <!-- <i class="fa fa-users menu-icon"></i> -->
      <span class="menu-title">My association <div class="badge badge-pill badge-warning" id="badging"><?php echo $numberOfAssociation ?></div></span>
    </a>

  </li>


  <?php if ($numberOfAssociation != 0) {
    // todays date trimmed
    $todayDate  = date('m/d/Y');
    $dateTrimer = strtotime($todayDate);

    //selection of user data
    foreach ($associations as $association) {
      $associationtoken = $association['groupToken'];
      // added by ivan
      $assocstatus = $association['status'];
      // $startingDate = $association['date_to_start']; 
      // $trimStarting = strtotime($startingDate);
  ?>

      <li class="nav-item" id="linksid">
        <a class="nav-link" href="<?php if($assocstatus == 2){?>errorsuspended<?php } else{?>singleAssoc?requestajaxhiddenId=<?php echo base64_encode(urlencode(md5($hashsalt))); ?>&&requesteddemo=<?php echo base64_encode(urlencode(($association['groupToken']))); ?>&&selectedproduct=<?php echo base64_encode(urlencode(md5($hashsalt2)));} ?>
">
          <!-- <i class="fa fa-users menu-icon"></i>  -->
          <span class="menu-title">
            <?php
            if ($assocstatus == 0) {
            ?>
              <img src="../../assets/images/svg/unlock.svg" style="width: 25px;" alt="">

            <?php } elseif ($assocstatus == 2) {
            ?>
              <img src="../../assets/images/svg/delay.svg" style="width: 25px;" alt="">

            <?php } elseif ($assocstatus == 1) {
            ?>
              <img src="../../assets/images/svg/lock.svg" style="width: 25px;" alt="">

            <?php } elseif ($assocstatus == 3) {
            ?>
            <img src="../../assets/images/svg/close.svg" style="width: 25px;" alt="">
            <?php } ?>

            <?php
            // line corrected by ivan
            echo mb_strimwidth($association['association_name'], 0, 25, "...");
            //echo $association['association_name']; 
            ?></span>

        </a>
      </li>
  <?php }
  } ?>
</ul>