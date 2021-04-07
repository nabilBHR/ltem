<?php

session_start();
require "db.php";

if ($_SESSION['mailu'] == NULL) {
  echo "<script language='javascript' type='text/javascript'>";
  echo 'window.location.href = "connexion.php"';
  echo "</script>";
}

if ($_SESSION['mailu'] == "admin@projet-ltem.com") {
  echo "<script language='javascript' type='text/javascript'>";
  echo 'window.location.href = "listKitsAdmin.php"';
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

    <div style="background-color:#FF7900;" class="wrap_header">
      <!-- Logo -->
      <a href="#" class="logo">
        <img src="images/icons/logo.png" alt="IMG-LOGO">
      </a>
      <!-- Menu -->
      <div class="wrap_menu">
        <nav class="menu">
          <ul class="main_menu">
            <div align="center">
              <button style="width: 180px; " type="button" onclick="location.href = 'dashboard.php'" class="btn btn-dark"> <i class="fa fa-bar-chart" aria-hidden="true"></i> DashBoard</button>
              <button style="width: 180px; " type="button" onclick="location.href = 'listeKits.php'" class="btn btn-dark"><i class="fa fa-microchip" aria-hidden="true"></i> Mes kits</button>
              <button style="width: 180px; " type="button" onclick="location.href = 'historique.php'" class="btn btn-dark"><i class="fa fa-history" aria-hidden="true"></i> Historique</button>
            </div>
          </ul>
        </nav>
      </div>

      <!-- Header Icon -->
      <div class="header-icons">
        <span class="linedivide1"></span>
        <?php echo $_SESSION['nomu'] . '	' . $_SESSION['prenomu']; ?>
        <div class="header-wrapicon2">
          <img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <!-- Header cart noti -->
          <div class="header-cart header-dropdown" style="background-color:#EBF5FB ; border-radius: 30px ; ">
            <div class="alert alert-secondary" role="alert">
              <?php echo '<strong> Utilisateur : </strong><br>' . $_SESSION['nomu'] . '	' . $_SESSION['prenomu'] . '<hr>' . '<strong> E-mail : </strong><br>' . $_SESSION['mailu']; ?>
            </div>
            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
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
  <div class="wrap_header_mobile" style="background-color:#FF7900  ;">
    <!-- Logo moblie -->
    <a href="#" class="logo-mobile">
      <img src="images/icons/logo.png" alt="IMG-LOGO">
    </a>
    <!-- Button show menu -->
    <div class="btn-show-menu">
      <!-- Header Icon mobile -->
      <div class="header-icons-mobile">
        <span class="linedivide2"></span>
        <?php echo $_SESSION['nomu'] . '	' . $_SESSION['prenomu']; ?>
        <div class="header-wrapicon2">
          <img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <!-- Header cart noti -->
          <div class="header-cart header-dropdown" style="background-color:#EBF5FB ; border-radius: 30px ; ">
            <div class="alert alert-secondary" role="alert">
              <?php echo '<strong> Utilisateur : </strong><br>' . $_SESSION['nomu'] . '	' . $_SESSION['prenomu'] . '<hr>' . '<strong> E-mail : </strong><br>' . $_SESSION['mailu']; ?>
            </div>
            <div class="header-cart-buttons">
              <div style="width: 75%; margin: auto;">
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
  <div class="wrap-side-menu fixed-top" style="top: 85px;">
    <nav class="side-menu">
      <div align="center" style="background-color:#FF7900; padding:15px;">
        <button style="width: 180px; margin:5px" type="button" onclick="location.href = 'dashboard.php'" class="btn btn-dark"> <i class="fa fa-bar-chart" aria-hidden="true"></i> DashBoard</button> </br>
        <button style="width: 180px; margin:5px" type="button" onclick="location.href = 'listeKits.php'" class="btn btn-dark"><i class="fa fa-microchip" aria-hidden="true"></i> Mes kits</button></br>
        <button style="width: 180px; margin:5px" type=" button" onclick="location.href = 'historique.php'" class="btn btn-dark"><i class="fa fa-history" aria-hidden="true"></i> Historique</button>
      </div>
    </nav>
  </div>
</header>