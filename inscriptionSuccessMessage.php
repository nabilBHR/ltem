<?php
if ($_SERVER['HTTP_REFERER'] !== NULL) {
?>
	<!DOCTYPE html>
	<html lang="fr">

	<head>

		<title>Félicitation </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.png" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/fonts/themify/themify-icons.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/fonts/elegant-font/html-css/style.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/animsition/css/animsition.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/slick/slick.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/vendor/lightbox2/css/lightbox.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="libs/css/util.css">
		<link rel="stylesheet" type="text/css" href="libs/css/main.css">
		<!--===============================================================================================-->

	</head>

	<body class="animsition">
		<?php require "header1.php"; ?>

		<div class="card bg-light m-t-80 ">
			<div align="center" class="card-header">Inscription réussie ! </div>
			<div class="card-body">
				<DIV ALIGN="CENTER">
					<div class="container">
						<div class="col-md-6 p-b-30">
							<?php echo	"<div class='alert alert-success' role='alert'>
												<h4 class='alert-heading'>Votre demande d'inscription est enregistrée.  <br><br></h4>
												<p>	
													Un lien de confirmation est envoyé à votre adresse e-mail <br></p>
												<hr>
												<p class='mb-0'> Veuillez valider votre compte !</p>
												</div>"; 	?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		require "footer.php"
		?>

		<!--===============================================================================================-->
		<script type="text/javascript" src="libs/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="libs/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="libs/vendor/bootstrap/js/popper.js"></script>
		<script type="text/javascript" src="libs/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="libs/vendor/slick/slick.min.js"></script>
		<script type="text/javascript" src="libs/js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script src="libs/js/main.js"></script>
		<!--===============================================================================================-->

	</body>

	</html>
<?php
} else {
	echo "<script language='javascript' type='text/javascript'>";
	echo 'window.location.href = "connexion.php"';
	echo "</script>";
}
?>