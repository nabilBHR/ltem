<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Mes compteurs</title>
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
	<link rel="stylesheet" type="text/css" href="libs/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="libs/css/util.css">
	<link rel="stylesheet" type="text/css" href="libs/css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<?php
	require "header2.php"
	?>

	<div class="card text-center">
		<div class="card-header">
			Mes compteurs
		</div>
		<div class="card-body">
			<a href="ajouterCompteur.php" type="submit" name="btnAddCt" class="btn btn-dark bo-rad-23"><i class="fa fa-plus" aria-hidden="true"></i>
				Ajouter un compteur
			</a>
			<?php

			$compteursParPage = 5;
			$idClient = $_SESSION['idu'];
			$nbCompteurs = 0;

			$bdd2 = new mysqli($servername, $username, $password, $dbname);
			$stmt4 = mysqli_prepare($bdd2, 'SELECT numeroCompteur , consommation, libelle FROM compteur where supprime = 0 AND idClient = ? ORDER BY idCompteur DESC');
			mysqli_stmt_bind_param($stmt4, "i", $idClient);
			mysqli_stmt_execute($stmt4);
			mysqli_stmt_bind_result($stmt4, $donnees['numeroCompteur'], $donnees['consommation'], $donnees['libelle']);

			while (mysqli_stmt_fetch($stmt4)) {
				$data[$nbCompteurs] = $donnees['numeroCompteur'] . ";" . $donnees['consommation'] . ";" . $donnees['libelle'];
				$nbCompteurs++;
			}


			$pagesTotales = ceil($nbCompteurs / $compteursParPage);
			if (isset($_GET['page'])  and !empty($_GET['page'])  and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			} else {
				$pageCourante = 1;
			}

			if ($nbCompteurs > 0) {
			?>
				<div align="left">
					<section class="cart bgwhite p-t-5 p-b-5">
						<div class="container">
							<!-- Cart item -->
							<div class="container-table-cart pos-relative">
								<div class="wrap-table-shopping-cart bgwhite">
									<table class="table-shopping-cart table-hover ">
										<tr class="table-head" style="background-color:#00FFBF;">
											<th style="width:30%" class="column-1">Libellé</th>
											<th style="width:20%" class="column-2">Nº compteur</th>
											<th style="width:20%" class="column-2">consommation</th>
											<th style="width:30%" class="column-3">Action</th>
										</tr>
										<?php

										foreach ($data as $value) {
											$tab = explode(";", $value);
										?>
											<tr class="table-row">
												<td class="column-1"><?php echo $tab[2];  ?></td>
												<td class="column-2"><?php echo $tab[0];  ?></td>
												<td class="column-3"><?php echo $tab[1] . ' Kwh';  ?> </td>
												<td class="column-4">
													<a href="pvoircommandeadmin.php?idcmd=<?php echo $idcmd; ?>&amp;idcl=<?php echo $idclient; ?>&amp;numeroCompteur=<?php echo $numeroCompteur; ?>"> <button type="button" class="btn btn-outline-info"><i style="float: left;" class="fa fa-eye"></i>   Details </button> </a>
													<a href="printadmin.php?idcmd=<?php echo $idcmd; ?>&amp;idcl=<?php echo $idclient; ?>&amp;numeroCompteur=<?php echo $numeroCompteur; ?>"><button type="button" class="btn btn-outline-danger"><i style="float: left;" class="fa fa-trash-o"></i>   Supprimer</button> </a>
												</td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>

							<div class="pagination flex-m flex-w p-t-26">
								<?php
								for ($nump = 1; $nump <= $pagesTotales; $nump++) {
									if ($nump == $pageCourante) {
								?>
										<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination"><?php echo $nump ?></a>
									<?php
									} else {
									?>
										<a href="listeCompteurs.php?page=<?php echo $nump ?>" class="item-pagination flex-c-m trans-0-4"><?php echo $nump ?></a>
								<?php
									}
								}
								?>
							</div>
						</div>
					</section>
				</div>
			<?php
			} else {
			?>
				<section class="cart bgwhite p-t-30 p-b-100">
					<div class="container">
						<div align="center" class="alert alert-warning" role="alert">
							Vous n'avez pas encore ajouter de compteur !
						</div>
					</div>
				</section>
			<?php } ?>
		</div>
	</div>

	<?php
	require "footer.php";
	?>

	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="libs/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="libs/js/main.js"></script>

</body>

</html>