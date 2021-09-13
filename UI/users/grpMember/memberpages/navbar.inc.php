<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" id="left-toplogo">
  <a class="navbar-brand brand-logo" href="index"><img src="../../assets/images/logo/logo(SVG).svg" alt="logo" /></a>
  <a class="navbar-brand brand-logo-mini" href="index"><img src="../../assets/images/logo/logo-mini(SVG).svg" alt="logo" /></a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch" id="left-toplong">

  <button style="color: white;" class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
    <span class="fas fa-bars" id="bars"></span>
  </button>
  <!-- <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul> -->
  <ul class="navbar-nav navbar-nav-right">
    <!-- <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="#">
              <span class="btn btn-primary">+ Create new</span>
            </a>
          </li> 

          <li class="nav-item dropdown d-none d-lg-flex">
            <div class="nav-link">
              <span class="dropdown-toggle btn btn-warning" id="languageDropdown" data-toggle="dropdown"> + Créer un nouveau</span>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item font-weight-medium" href="newAssoc">
                  Association
                </a>
                <div class="dropdown-divider"></div>
             
              </div>
            </div>
          </li>
          -->


    <li class="nav-item dropdown d-none d-lg-flex">
      <div class="nav-link">
        <span class="dropdown-toggle btn btn-outline-warning" id="languageDropdown" data-toggle="dropdown"> <i class="flag-icon flag-icon-fr" id="fr" title="fr"></i>Français</span>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
          <a class="dropdown-item font-weight-medium" href="#">
            <i class="flag-icon flag-icon-gb" id="gb" title="gb"></i>
            English
          </a>
          <div class="dropdown-divider"></div>

        </div>
      </div>
    </li>

    <li class="nav-item dropdown d-none d-lg-flex">
      <div class="nav-link">
        <span class="dropdown-toggle btn btn-warning"> <i class="flag-icon flag-icon-<?php echo $countryCode; ?>" id="<?php echo $countryCode; ?>" title="rw"></i> <b style="text-transform: uppercase;"><?php echo $countryName; ?> </b> </span>

      </div>
    </li>

    <a class="btn-sm btn-warning" data-placement="top" title="Create New Association" href="newAssoc"<?php echo$disable;?> >
      <i class="fas fa-plus mx-0" id="member-notif"></i>
    </a>

    <li class="nav-item nav-profile dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" style="color: white">
        <?php if ($memberImage == 'default_avatar.png') { ?>

          <img src="../member_pics/<?php echo $memberImage; ?>" alt="profile" />

        <?php } else {
        ?>

          <img src="../member_pics/<?php echo $memToken . $memberImage; ?>" alt="profile" />
        <?php } ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">


        <div class="dropdown-divider"></div>

        <a href="memberProfile" class="dropdown-item">
          <i class="fas fa-user text-primary"></i>
          Mon profil
        </a>


        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../../auth/logout.php">
          <i class="fas fa-power-off text-primary"></i>
          Déconnexion
        </a>
      </div>
    </li>
    <!-- <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li> -->
  </ul>

  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="fas fa-bars"></span>
  </button>


</div>