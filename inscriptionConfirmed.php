<?php
if (isset($_GET['mail'], $_GET['key']) and !empty($_GET['mail']) and !empty($_GET['key'])) {

	$mu = urldecode($_GET['mail']);
	$key = $_GET['key'];

	$stmt = mysqli_prepare($bdd, 'SELECT confirmMail FROM utilisateur where email = ? AND confirmKey = ? LIMIT 1');
	mysqli_stmt_bind_param($stmt, "ss", $mu, $key);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$verifmail = mysqli_stmt_num_rows($stmt);

	if ($verifmail == 1) {
		mysqli_stmt_bind_result($stmt, $donnees['confirmMail']);
		mysqli_stmt_fetch($stmt);
		$conf = $donnees['confirmMail'];

		if ($conf == 0) {
			$stmt2 = mysqli_prepare($bdd, ' UPDATE utilisateur SET confirmMail =1    WHERE email = ? LIMIT 1');
			mysqli_stmt_bind_param($stmt2, "s", $mu);
			mysqli_stmt_execute($stmt2);

			$mess = "<div class='alert alert-success' role='alert'>
							<h4 class='alert-heading'>Adresse mail validé !.  <br><br></h4>
							<p>	Votre compte est activé !<br></p>
							<hr>
					</div>";
		} else {
			exit;
		}
	} else {
		exit;
	}
} else {
	exit;
}
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
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->

</head>

<body class="animsition">

	<?php require "header1.php"; ?>

	<div class="card bg-light m-t-80">
		<div align="center" class="card-header">Inscription réussie ! </div>
		<div class="card-body">
			<DIV ALIGN="CENTER">
				<div class="container">
					<div class="col-md-6 p-b-30">
						<form class="leave-comment" method="post">
							<?php echo	$mess; 	?>
						</form>
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
<?php $bdd->close(); ?>