<!DOCTYPE html>
<html lang="fr">

<head>

	<title>Inscription</title>
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

	<body>
		<?php
		require "header1.php";
		$erreur = '';

		if (isset($_POST['btnIns'])) {
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$numeroAbonne = $_POST['numeroAbonne'];
			$departement = $_POST['departement'];
			$adresse = $_POST['adresse'];
			$tel1 = $_POST['tel1'];
			if ($_POST['tel2'] == "") {
				$tel2 = '0';
			} else {
				$tel2 = $_POST['tel2'];
			}
			$email = $_POST['email'];
			$motPasse = $_POST['motPasse'];
			$motPasse2 = $_POST['motPasse2'];

			if (preg_match('#^[[:alpha:]]+([\-\' ][[:alpha:]]+)*$#', $nom)  && strlen($nom) < 26 && strlen($nom) > 2) {
				if (preg_match('#^[[:alpha:]]+([\-\' ][[:alpha:]]+)*$#', $prenom)  && strlen($prenom) < 26  && strlen($prenom) > 2) {
					if (preg_match('`[0-9]`', $numeroAbonne) && strlen($numeroAbonne) < 26 && strlen($numeroAbonne) > 4) {
						if (strlen($adresse) > 5 && strlen($adresse) < 251) {
							if (preg_match('`[0-9]{10}`', $tel1) && strlen($tel1) == 10) {
								if ((empty($_POST['tel2'])) || (preg_match('`[0-9]{10}`', $tel2) && strlen($tel2) == 10)) {
									if (strlen($motPasse) > 5) {
										if (strlen($motPasse) < 31) {
											if ($motPasse == $motPasse2) {
												if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
													$stmt = mysqli_prepare($bdd, 'SELECT email,blocage FROM utilisateur where email = ? ');
													mysqli_stmt_bind_param($stmt, "s", $email);
													mysqli_stmt_execute($stmt);
													mysqli_stmt_store_result($stmt);
													$verifmail = mysqli_stmt_num_rows($stmt);
													if ($verifmail == 0) {
														// inscription reussie
														$longueurkey = 20;
														$key = "";
														for ($i = 0; $i < $longueurkey; $i++) {
															$key .= mt_rand(0, 9);
														}

														// Une fois mis en ligne
														//$message ='	<a target="blank" href="https://ltem.000webhostapp.com/inscriptionConfirmed.php?mail='.urlencode($email).'&key='.$key.'"> Confirmez votre compte ! </a> ' ;
														//mail($email, 'Confirmation de compte', $message);

														$sql7 = "INSERT INTO utilisateur (nom, prenom, numeroAbonne , departement, adresse, tel1 , tel2, email, motPasse, confirmKey) 
														VALUES ('$nom', '$prenom' , '$numeroAbonne' , '$departement' , '$adresse' , '$tel1' , '$tel2' , '$email' , '$motPasse', '$key')";
														$execute = $bdd->query($sql7);

														echo "<script language='javascript' type='text/javascript'>";
														echo 'window.location.href = "inscriptionSuccessMessage.php"';
														echo "</script>";
													} else {
														mysqli_stmt_bind_result($stmt, $donnees['email'], $donnees['blocage']);
														mysqli_stmt_fetch($stmt);
														$bloc = $donnees['blocage'];
														if ($bloc == 1) {
															// utilisateur bloqué
															$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
																	   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	   <strong> Votre adresse email est bloquée !</strong>
																	   </div>';
														}
														//mysqli_free_result($result);
														else {
															// mail existant
															$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
																	   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	   <strong>Il existe déja un compte pour cette adresse mail !</strong>
																	   </div>';
														}
													}
												} else {
													$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
															   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															   <strong>Votre adreese mail n\'est pas valide !</strong>
															   </div>';
												}
											} else {
												$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
														   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														   <strong>Vos mots de passe ne sont pas identiques !</strong>
														   </div>';
											}
										} else {
											$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Votre mot de passe est trop long !</strong>
											<hr>
											<p>la longueur du mot de passe doit être comprise entre 6 et 30 caractères </p>
											</div>';
										}
									} else {
										$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
												   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											   	   <strong>Votre mot de passe est trop court !</strong>
												   <hr>
												   <p>la longueur du mot de passe doit être comprise entre 6 et 30 caractères </p>
												   </div>';
									}
								} else {
									$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
										   	   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											   <strong>Le 2ème numéro de téléphone saisi n\'est pas valide !</strong>
											   </div>';
								}
							} else {
								$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
										   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										   <strong>Le 1er numéro de téléphone saisi n\'est pas valide !</strong>
										   </div>';
							}
						} else {
							$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
									   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									   <strong> Votre adresse n\'est pas valide !</strong>
									   <hr>
									   <p>Veuillez préciser le nom et N° de rue svp !.<p>
									   </div>';
						}
					} else {
						$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
								   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								   <strong>Numéro d\'abonné invalide !</strong>
								   </div>';
					}
				} else {
					$erreur = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
							   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							   <strong>Veuillez saisir votre vrai prénom !</strong>
							   </div>';
				}
			} else {
				$erreur = '<div  align="center" class="alert alert-danger alert-dismissible" role="alert">
						   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						   <strong>Veuillez saisir votre vrai nom !</strong>
						   </div>';
			}
		}
		?>

		<form method="post" action="">
			<div class="card bg-light ">
				<div align="center" class="card-header">Inscription </div>
				<div align="center" class="card-body">
					<div class="container">
						<?php echo $erreur;  ?>
						<div class="row">

							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Vos informations </h5>
										<p class="card-text">
										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nom" placeholder="Votre nom" required='required'>
										</div>
										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="prenom" placeholder="Votre prénom" required='required'>
										</div>
										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="tel1" placeholder="Numéro de téléphone 1" required='required'>
										</div>
										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="tel2" placeholder="Numéro de téléphone 2 (facultatif)">
										</div>
										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Saisissez votre adresse e-mail" required='required'>
										</div>

										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="motPasse" placeholder="Choisissez un mot de passe" required='required'>
										</div>

										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="motPasse2" placeholder="Confirmez votre mot de passe" required='required'>
										</div>
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Domicile et abonnement </h5>
										<p class="card-text">
										<div class="bo5 of-hidden size15  col-auto m-b-5">
											<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="numeroAbonne" placeholder="Numero d'abonné" required='required'>
										</div>
										<section class="bgwhite p-t-0 p-b-0">
											<div class="flex-m flex-w p-b-0">
												<div class="bo5 of-hidden size15 col-auto m-b-5">
													<div class="sizefull s-text7 p-l-22 p-r-22">
														<select class="selection-2" name="departement" required='required'>
															<option selected disabled value="">Département</option>
															<option value="01">(01) Ain </option>
															<option value="02">(02) Aisne </option>
															<option value="03">(03) Allier </option>
															<option value="04">(04) Alpes de Haute Provence </option>
															<option value="05">(05) Hautes Alpes </option>
															<option value="06">(06) Alpes Maritimes </option>
															<option value="07">(07) Ardèche </option>
															<option value="08">(08) Ardennes </option>
															<option value="09">(09) Ariège </option>
															<option value="10">(10) Aube </option>
															<option value="11">(11) Aude </option>
															<option value="12">(12) Aveyron </option>
															<option value="13">(13) Bouches du Rhône </option>
															<option value="14">(14) Calvados </option>
															<option value="15">(15) Cantal </option>
															<option value="16">(16) Charente </option>
															<option value="17">(17) Charente Maritime </option>
															<option value="18">(18) Cher </option>
															<option value="19">(19) Corrèze </option>
															<option value="2A">(2A) Corse du Sud </option>
															<option value="2B">(2B) Haute-Corse </option>
															<option value="21">(21) Côte d'Or </option>
															<option value="22">(22) Côtes d'Armor </option>
															<option value="23">(23) Creuse </option>
															<option value="24">(24) Dordogne </option>
															<option value="25">(25) Doubs </option>
															<option value="26">(26) Drôme </option>
															<option value="27">(27) Eure </option>
															<option value="28">(28) Eure et Loir </option>
															<option value="29">(29) Finistère </option>
															<option value="30">(30) Gard </option>
															<option value="31">(31) Haute Garonne </option>
															<option value="32">(32) Gers </option>
															<option value="33">(33) Gironde </option>
															<option value="34">(34) Hérault </option>
															<option value="35">(35) Ille et Vilaine </option>
															<option value="36">(36) Indre </option>
															<option value="37">(37) Indre et Loire </option>
															<option value="38">(38) Isère </option>
															<option value="39">(39) Jura </option>
															<option value="40">(40) Landes </option>
															<option value="41">(41) Loir et Cher </option>
															<option value="42">(42) Loire </option>
															<option value="43">(43) Haute Loire </option>
															<option value="44">(44) Loire Atlantique </option>
															<option value="45">(45) Loiret </option>
															<option value="46">(46) Lot </option>
															<option value="47">(47) Lot et Garonne </option>
															<option value="48">(48) Lozère </option>
															<option value="49">(49) Maine et Loire </option>
															<option value="50">(50) Manche </option>
															<option value="51">(51) Marne </option>
															<option value="52">(52) Haute Marne </option>
															<option value="53">(53) Mayenne </option>
															<option value="54">(54) Meurthe et Moselle </option>
															<option value="55">(55) Meuse </option>
															<option value="56">(56) Morbihan </option>
															<option value="57">(57) Moselle </option>
															<option value="58">(58) Nièvre </option>
															<option value="59">(59) Nord </option>
															<option value="60">(60) Oise </option>
															<option value="61">(61) Orne </option>
															<option value="62">(62) Pas de Calais </option>
															<option value="63">(63) Puy de Dôme </option>
															<option value="64">(64) Pyrénées Atlantiques </option>
															<option value="65">(65) Hautes Pyrénées </option>
															<option value="66">(66) Pyrénées Orientales </option>
															<option value="67">(67) Bas Rhin </option>
															<option value="68">(68) Haut Rhin </option>
															<option value="69">(69) Rhône </option>
															<option value="70">(70) Haute Saône </option>
															<option value="71">(71) Saône et Loire </option>
															<option value="72">(72) Sarthe </option>
															<option value="73">(73) Savoie </option>
															<option value="74">(74) Haute Savoie </option>
															<option value="75">(75) Paris </option>
															<option value="76">(76) Seine Maritime </option>
															<option value="77">(77) Seine et Marne </option>
															<option value="78">(78) Yvelines </option>
															<option value="79">(79) Deux Sèvres </option>
															<option value="80">(80) Somme </option>
															<option value="81">(81) Tarn </option>
															<option value="82">(82) Tarn et Garonne </option>
															<option value="83">(83) Var </option>
															<option value="84">(84) Vaucluse </option>
															<option value="85">(85) Vendée </option>
															<option value="86">(86) Vienne </option>
															<option value="87">(87) Haute Vienne </option>
															<option value="88">(88) Vosges </option>
															<option value="89">(89) Yonne </option>
															<option value="90">(90) Territoire de Belfort </option>
															<option value="91">(91) Essonne </option>
															<option value="92">(92) Hauts de Seine </option>
															<option value="93">(93) Seine Saint Denis </option>
															<option value="94">(94) Val de Marne </option>
															<option value="95">(95) Val d'Oise </option>
															<option value="971">(971) Guadeloupe </option>
															<option value="972">(972) Martinique </option>
															<option value="973">(973) Guyane </option>
															<option value="974">(974) Réunion </option>
															<option value="975">(975) Saint Pierre et Miquelon </option>
															<option value="976">(976) Mayotte </option>
															<option value="99">(99) Etranger</option>
														</select>
													</div>
												</div>
											</div>
										</section>
										<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="adresse" placeholder="Adresse : nom et N° de rue et ville/code postal" required='required'></textarea>
										<div class="w-size25">
											<button type="submit" name="btnIns" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
												S'inscrire
											</button>
										</div>
									</div>
								</div>
								<br>
								<h5>Vous êtes deja membre ? <a href="connexion.php"> Connectez-vous !</a></h5>
							</div>

						</div>
					</div>
				</div>
			</div>
		</form>

	</body>

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

</html>