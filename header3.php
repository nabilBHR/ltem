<?php

session_start();
require "db.php";

if ($_SESSION['mailu'] == NULL) {
  echo "<script language='javascript' type='text/javascript'>";
  echo 'window.location.href = "connexion.php"';
  echo "</script>";
}

if ($_SESSION['mailu'] != "admin@projet-ltem.com") {
  echo "<script language='javascript' type='text/javascript'>";
  echo 'window.location.href = "listeKits.php"';
  echo "</script>";
}

if (isset($_POST['btndec']) or isset($_POST['btndec2'])) {
  session_destroy();
  header('location: index.php');
  exit;
}

?>

<!-- Header -->
<header class="header1 fixed-top">

  <!-- Header desktop -->
  <div>

    <div style="background-color:#FF7900  ;" class="wrap_header">
      <!-- Logo -->
      <a href="#" class="logo">
        <img src="images/icons/logo.png" alt="IMG-LOGO">
      </a>
      <!-- Menu -->
      <div class="wrap_menu">
        <nav class="menu">
          <ul class="main_menu">
            <div align="center">
              <button style="width: 180px; " type="button" onclick="location.href = 'messagerie.php'" class="btn btn-dark"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Messagerie</button>
              <button style="width: 180px; " type="button" onclick="location.href = 'listKitsAdmin.php'" class="btn btn-dark"><i class="fa fa-microchip" aria-hidden="true"></i> Liste des kits</button>
            </div>
          </ul>
        </nav>
      </div>

      <!-- Header Icon -->
      <div class="header-icons">
        <span class="linedivide1"></span>
        <?php echo "Administrateur" ?>
        <div class="header-wrapicon2">
          <img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <!-- Header cart noti -->
          <div class="header-cart header-dropdown" style="background-color:#EBF5FB ; border-radius: 30px ; ">
            <div class="alert alert-secondary" role="alert">
              <?php echo '<strong> Utilisateur : </strong><br>' . "Administrateur" . '<hr>' . '<strong> E-mail : </strong><br>' . $_SESSION['mailu']; ?>
            </div>
            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="parametres2.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                  Paramètres
                </a>
              </div>
              <div class="header-cart-wrapbtn">
                <form method="post">
                  <input type="submit" name="btndec" value="Déconnexion" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Mobile -->
  <div class="wrap_header_mobile col-12 fixed-top" style="background-color:#FF7900  ;">
    <!-- Logo moblie -->
    <a href="#" class="logo-mobile">
      <img src="images/icons/logo.png" alt="IMG-LOGO">
    </a>
    <!-- Button show menu -->
    <div class="btn-show-menu">
      <!-- Header Icon mobile -->
      <div class="header-icons-mobile">
        <span class="linedivide2"></span>
        <?php echo "Administrateur"; ?>
        <div class="header-wrapicon2">
          <img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <!-- Header cart noti -->
          <div class="header-cart header-dropdown" style="background-color:#EBF5FB ; border-radius: 30px ; ">
            <div class="alert alert-secondary" role="alert">
              <?php echo '<strong> Utilisateur : </strong><br>' . "Administrateur" . '<hr>' . '<strong> E-mail : </strong><br>' . $_SESSION['mailu']; ?>
            </div>
            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="parametres2.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                  Paramètres
                </a>
              </div>
              <div class="header-cart-wrapbtn">
                <form method="post">
                  <input type="submit" name="btndec" value="Déconnexion" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </div>
  </div>

  <!-- Menu Mobile -->
  <div class="wrap-side-menu">
    <nav class="side-menu">
      <div">
        <br>
        <div class="col-lg-11 col-md-6">
          <div class="media">
            <div class="d-flex">
              <div class="icon-box col-md-3 col-sm-4"><i class="fa fa-map-marker"></i></div>
            </div>
            <div class="media-body">
              <p></p>Magasin Wa3ou Electronics <br />Rue Hassiba Ben Bouali, Alger centre.</p>
            </div>
          </div>
        </div>
        <hr>
        <div class="col-lg-10 col-md-6">
          <div class="media">
            <div class="d-flex">
              <div class="icon-box col-md-3 col-sm-4"><i class="fa fa-phone"></i></div>
            </div>
            <div class="media-body">
              <a href="tel:+1109171234567">0558947335</a> <br>
              <a href="tel:+1101911897654">0555678854</a>
            </div>
          </div>
        </div>
        <hr>
        <div class="col-lg-10 col-md-6">
          <div class="media">
            <div class="d-flex">
              <div class="icon-box col-md-3 col-sm-4"><i class="fa fa-envelope"></i></a></div>
            </div>
            <div class="media-body">
              Mettre un truc ici ...
            </div>
          </div>
        </div>
        <br>
        <div align="center" style="background-color:#FF7900  ;">
          <button style="width: 180px; margin:2px" type="button" onclick="location.href = 'messagerie.php'" class="btn btn-dark"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Messagerie</button> </br>
          <button style="width: 180px; " type="button" onclick="location.href = 'listKitsAdmin.php'" class="btn btn-dark"><i class="fa fa-microchip" aria-hidden="true"></i> Liste des kits</button></br>
        </div>
    </nav>
  </div>
</header>