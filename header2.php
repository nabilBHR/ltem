<?php

session_start();
require "db.php";

if ($_SESSION['mailu'] == NULL) {
  echo "<script language='javascript' type='text/javascript'>";
  echo 'window.location.href = "connexion.php"';
  echo "</script>";
}

$mailu = $_SESSION['mailu'];
$stmt = mysqli_prepare($bdd, 'SELECT id, nom, prenom, numeroAbonne, departement, adresse, tel1, tel2 , motPasse FROM utilisateur where email = ? ');
mysqli_stmt_bind_param($stmt, "s", $mailu);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['numeroAbonne'], $donnees['departement'], $donnees['adresse'], $donnees['tel1'], $donnees['tel2'], $donnees['motPasse']);
mysqli_stmt_fetch($stmt);

$_SESSION['idu'] = $donnees['id'];
$_SESSION['nomu'] = $donnees['nom'];
$_SESSION['prenomu'] = $donnees['prenom'];
$_SESSION['numeroAbonneu'] = $donnees['numeroAbonne'];
$_SESSION['departementu'] = $donnees['departement'];
$_SESSION['adresseu'] = $donnees['adresse'];
$_SESSION['tel1u'] = $donnees['tel1'];
$_SESSION['tel2u'] = $donnees['tel2'];
$_SESSION['motPasse'] = $donnees['motPasse'];

if (isset($_POST['btndec']) or isset($_POST['btndec2'])) {
  session_destroy();
  header('location: index.php');
  exit;
}

?>

<!-- Header -->
<header class="header1">

  <!-- Header desktop -->
  <div class="container-menu-header">

    <div class="topbar">
      <table>
        <tr>
          <th class="col-lg-12 col-md-6">
            <div class="col-lg-12 col-md-6">
              <div class="media">
                <div class="d-flex">
                  <div class="icon-box col-md-3 col-sm-4"><i class="fa fa-envelope"></i></a></div>
                </div>
                <div class="media-body">
                  Mettre un truc ici ...
                </div>
              </div>
            </div>
          </th>
        </tr>
      </table>
    </div>

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
              <button style="width: 180px; " type="button" onclick="location.href = 'dashboard.php'" class="btn btn-dark"> <i class="fa fa-bar-chart" aria-hidden="true"></i> DashBoard</button>
              <button style="width: 180px; " type="button" onclick="location.href = 'listeKits.php'" class="btn btn-dark"><i class="fa fa-microchip" aria-hidden="true"></i>Mes kits</button>
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
            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="pparametresclient.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
        <?php //echo $_SESSION['nomu'].'	'.$_SESSION['prenomu'] ; 
        ?>
        <div class="header-wrapicon2">
          <img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
          <!-- Header cart noti -->
          <div class="header-cart header-dropdown" style="background-color:#EBF5FB ; border-radius: 30px ; ">
            <div class="header-cart-buttons">
              <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="pparametresclient.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
          <button style="width: 180px; margin:2px" type="button" onclick="location.href = 'dashboard.php'" class="btn btn-dark"> <i class="fa fa-bar-chart" aria-hidden="true"></i> DashBoard</button> </br>
          <button style="width: 180px; " type="button" onclick="location.href = 'listeKits.php'" class="btn btn-dark"><i class="fa fa-microchip" aria-hidden="true"></i> Mes kits</button></br>
          <button style="width: 180px; margin:2px" type=" button" onclick="location.href = 'historique.php'" class="btn btn-dark"><i class="fa fa-history" aria-hidden="true"></i> Historique</button>
        </div>
    </nav>
  </div>
</header>