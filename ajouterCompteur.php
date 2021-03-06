<!DOCTYPE html>
<html lang="fr">

<head>

	<title>Ajout d'un compteur</title>
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
	require "header2.php";

	$erreur = '';

	if (isset($_POST['btnAdd'])) {

		$numeroCompteur = $_POST['numeroCompteur'];
		$libelleCompteur = $_POST['libelleCompteur'];
		$idClient = $_SESSION['idu'];

		if (is_numeric($numeroCompteur)  && strlen($numeroCompteur) < 26 && strlen($numeroCompteur) > 4) {
			if (strlen($libelleCompteur) > 2 && strlen($libelleCompteur) < 26) {

				$bdd2 = new mysqli($servername, $username, $password, $dbname);

				$stmt = mysqli_prepare($bdd2, 'SELECT numeroCompteur, idClient FROM compteur where numeroCompteur = ?');
				mysqli_stmt_bind_param($stmt, "s", $numeroCompteur);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$verifCompteur = mysqli_stmt_num_rows($stmt);
				if ($verifCompteur == 0) {

					$sql7 = "INSERT INTO compteur  (numeroCompteur ,libelle, idClient) VALUES ('$numeroCompteur', '$libelleCompteur', '$idClient')";
					$execute = $bdd2->query($sql7);

					echo "<script language='javascript' type='text/javascript'>";
					echo 'window.location.href = "listeCompteurs.php"';
					echo "</script>";
				} else {
					$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Numéro de compteur existe déja !</strong>
					</div>';
				}
			} else {
				$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
						   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						   <strong>Le libellé que vous avez choisi est invalide !</strong>
						   </div>';
			}
		} else {
			$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					   <strong>Numéro de compteur invalide !</strong>
					   </div>';
		}
	}
	?>

	<div class="card bg-light ">
		<div align="center" class="card-header">Ajout d'un nouveau compteur</div>
		<div class="card-body">
			<!-- formulaire connexion-->
			<DIV ALIGN="CENTER">
				<div class="container">
					<div class="col-md-6 p-b-30">
						<form class="leave-comment" method="post">
							<?php echo $erreur; ?>
							<div class="bo5 of-hidden size15  col-auto m-b-5">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="numeroCompteur" placeholder="Numero de votre compteur" required='required'>
							</div>
							<div class="bo5 of-hidden size15  col-auto m-b-5">
								<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="libelleCompteur" placeholder="Choisir un libellé pour le compteur" required='required'>
							</div>
							<div class="w-size25">
								<button type="submit" name="btnAdd" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
									Ajouter
								</button>
							</div>
							<br>
					</div>
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