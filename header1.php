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
</header>