<!DOCTYPE html>
<html lang="fr">

<head>

	<title>Connexion</title>
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
	<?php
	require "header1.php";

	$erreur = '';

	if (isset($_POST['btnCon'])) {
		$email = $_POST['email'];
		$stmt = mysqli_prepare($bdd, 'SELECT email, motPasse , confirmMail , blocage FROM utilisateur where email = ? ');
		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$verifmail = mysqli_stmt_num_rows($stmt);

		if ($verifmail == 1) {
			mysqli_stmt_bind_result($stmt, $donnees['email'], $donnees['motPasse'], $donnees['confirmMail'], $donnees['blocage']);
			mysqli_stmt_fetch($stmt);
			$bloc = $donnees['blocage'];
			$valid = $donnees['confirmMail'];
			$mdp = $donnees['motPasse'];

			if ($bloc == 1) {
				// utilisateur bloqué
				$erreur = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong> Votre compte est bloqué !</strong>
				</div>';
			} else if ($valid == 0) {
				// compte non validé
				$erreur = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Adresse mail pas encore validée !</strong>
				<hr>
				<p>Veuillez cliquer sur le lien de validation envoyé par mail.<p>
				</div>';
			} else if ($mdp != $_POST['motPasse']) {
				// mot de passe incorrect 
				$erreur = '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong> Mot de passe incorrect ! </strong>
				</div>';
			} else {

				// Utilisateur connecté !
				$_SESSION['mailu'] = $email;
				if ($_POST['email'] == "admin@projet-ltem.com") {
					echo "<script language='javascript' type='text/javascript'>";
					echo 'window.location.href = "pdemandesins.php"';
					echo "</script>";
				} else {
					echo "<script language='javascript' type='text/javascript'>";
					echo 'window.location.href = "listeCompteurs.php"';
					echo "</script>";
				}
			}
		} else {
			//mail incorrect 
			$erreur = '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong> il n\'existe pas de compte pour cette adresse mail ! </strong>
			</div>';
		}
	}
	?>

	<div class="card bg-light ">
		<div align="center" class="card-header">Connexion</div>
		<div class="card-body">
			<!-- formulaire connexion-->
			<DIV ALIGN="CENTER">
				<div class="container">
					<div class="col-md-6 p-b-30">
						<form class="leave-comment" method="post">
							<?php echo $erreur; ?>
							<div class="bo5 of-hidden size15  col-auto m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Votre adresse e-mail" required='required'>
							</div>
							<div class="bo5 of-hidden size15  col-auto m-b-20">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="motPasse" placeholder="Votre mot de passe" required='required'>
							</div>
							<div class="w-size25">
								<button type="submit" name="btnCon" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
									Se connecter
								</button>
							</div>
							<br>
					</div>
					<h5>Vous n'êtes pas encore membre ? <a href="inscription.php"> Inscrivez-vous !</a></h5>
				</div>
				</form>
			</div>
		</div>
	</div>

	<?php require "footer.php" ?>

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