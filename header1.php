<?php
session_start();
require "db.php";
if (isset($_SESSION['mailu'])) {
  echo "<script language='javascript' type='text/javascript'>";
  echo 'window.location.href = "listeKits.php"';
  echo "</script>";
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
      <a href="index.php" class="logo">
        <img src="images/icons/logo.png" alt="IMG-LOGO">
      </a>

      <!-- Menu -->
      <div class="wrap_menu">
        <nav class="menu">
          <ul class="main_menu">
            <h4 class="s-text12 p-b-30">
              <br>DEVENNEZ MEMBRE POUR PROFITER PLEINEMENT DE NOS SERVICES !
            </h4>
          </ul>
        </nav>
      </div>

      <!-- Header Icon -->
      <div class="header-icons">
      </div>
    </div>
  </div>

  <!-- Header Mobile -->
  <div class="wrap_header_mobile" style="background-color:#FF7900  ;">
    <!-- Logo moblie -->
    <a href="index.php" class="logo-mobile">
      <img src="images/icons/logo.png" alt="IMG-LOGO">
    </a>
    <!-- Button show menu -->
    <div class="btn-show-menu">
      <!-- Header Icon mobile -->
      <div class="header-icons-mobile">
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
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

  </div>
  </nav>
  </div>
</header>