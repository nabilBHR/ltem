<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Ajout d'un kit</title>
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

		$imei = $_POST['imeis'];
		$libelleKit = $_POST['module'];
		$modele = $_POST['moduleName'];
		$serialNumber = $_POST['fsn'];
		$idClient = $_SESSION['idu'];

		if (is_numeric($imei)  && strlen($imei) < 18 && strlen($imei) > 14) {
			if (preg_match("/^[a-zA-Z0-9]+$/", $serialNumber) && strlen($serialNumber) > 5 && strlen($serialNumber) < 26) {
				if (strlen($libelleKit) > 2 && strlen($libelleKit) < 26) {

					$bdd2 = new mysqli($servername, $username, $password, $dbname);
					$stmt = mysqli_prepare($bdd2, 'SELECT imei, idClient FROM kit where imei = ? LIMIT 1');
					mysqli_stmt_bind_param($stmt, "s", $imei);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$verifCompteur = mysqli_stmt_num_rows($stmt);
					if ($verifCompteur == 0) {

						$sql7 = "INSERT INTO kit  (imei , serialNumber, modele, libelle, idClient) VALUES ('$imei', '$serialNumber', '$modele', '$libelleKit', '$idClient')";
						$execute = $bdd2->query($sql7);

						echo "<script language='javascript' type='text/javascript'>";
						echo 'window.location.href = "listeKits.php"';
						echo "</script>";
					} else {
						$erreur = "<div align='center' class='alert alert-danger alert-dismissible' role='alert'>
								<h4 class='alert-heading'>Ce kit existe déja dans nos bases de données ! <br><br></h4>
								<hr>
								<p class='mb-0'> contactez l'admin pour plus d'informations.</p>
								</div>";
					}
				} else {
					$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
						   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						   <strong>Le modele saisi est invalide !</strong>
						   </div>';
				}
			} else {
				$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					   <strong>le numéro de série saisi est invalide !</strong>
					   </div>';
			}
		} else {
			$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
					   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					   <strong>IMEI saisi est invalide !</strong>
					   </div>';
		}
	}
	?>

	<div class="card bg-light ">
		<div align="center" class="card-header">Ajout d'un nouveau kit</div>
		<div class="card-body">
			<!-- formulaire connexion-->
			<DIV ALIGN="CENTER">
				<div class="container">
					<div class="col-md-6 p-b-30">
						<form class="leave-comment" method="post">
							<?php echo $erreur; ?>
							<section class="bgwhite p-t-0 p-b-0">
								<div class="form-group">
									<select class="form-control" id="imeis" name="imeis" onchange=remplireForme()></select>
								</div>
							</section>
							<section class="bgwhite p-t-0 p-b-0">
								<div class="flex-m flex-w p-b-0">
									<div class="bo5 of-hidden size15 col-auto m-b-5">
										<div class="sizefull s-text7 p-l-22 p-r-22">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="fsn" name="fsn" placeholder="fsn" required='required'>
										</div>
									</div>
								</div>
							</section>
							<section class="bgwhite p-t-0 p-b-0">
								<div class="flex-m flex-w p-b-0">
									<div class="bo5 of-hidden size15 col-auto m-b-5">
										<div class="sizefull s-text7 p-l-22 p-r-22">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="moduleName" name="moduleName" placeholder="Nom du module" required='required'>
										</div>
									</div>
								</div>
							</section>
							<section class="bgwhite p-t-0 p-b-0">
								<div class="flex-m flex-w p-b-0">
									<div class="bo5 of-hidden size15 col-auto m-b-5">
										<div class="sizefull s-text7 p-l-22 p-r-22">


											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="module" id="module" placeholder="Module" required='required'>


										</div>
									</div>
								</div>
							</section>
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
	<script type="text/javascript" src="libs/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
	<!--===============================================================================================-->
	<script src="libs/js/main.js"></script>
</body>
<script>
	var dataOctave;
	var selectIMEIs = document.getElementById("imeis");
	var companyName = "universit_gustave_eiffel";
	//var dID = "d6048d14e337dab5dbbb15059";
	var getValues = {};

	$.ajax({
		url: "https://octave-api.sierrawireless.io/v5.0/" + "<?php echo $_SESSION['companyName'] ?>" + "/device/",
		headers: {
			'X-Auth-User': "<?php echo $_SESSION['userName'] ?>",
			'X-Auth-Token': "<?php echo $_SESSION['token'] ?>",
		},
		type: "GET",
		cache: false,
		success: function(data, textStatus, request) {
			dataOctave = data;
			data.body.forEach(function(element, key) {
				selectIMEIs[key] = new Option(element.hardware.imei, element.hardware.imei);
			});;
			remplireForme();
		},
		error: function(request, textStatus, errorThrown) {
			alert("Erreur d'authetification sur Octave ! Veuillez raffraichir la page et si ca persiste contacter l'admin.");
			console.log("Erreur d'authetification sur Octave");
		}
	})

	function remplireForme() {
		var data = (dataOctave.body).find(element =>
			element.hardware.imei === selectIMEIs.options[selectIMEIs.selectedIndex].innerHTML
		);
		document.getElementById("fsn").value = data.hardware.fsn;
		document.getElementById("moduleName").value = data.name;
		var module = document.getElementById("module");
		if (data.hardware.module != undefined) {
			module.value = data.hardware.module;
			//module.disabled = true;
		} else {
			module.value = "";
			module.disabled = false;
		}
	}
</script>

</html>