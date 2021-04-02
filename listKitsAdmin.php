<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Liste des kits</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/jquery/jquery-3.2.1.min.js"></script>
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
	require "header3.php"
	?>

	<div class="card text-center m-t-85">
		<div class="card-header">
			Liste des kits
		</div>
		<div class="card-body">

			<?php

			$kitsParPage = 5;
			$nbkits = 0;

			$bdd2 = new mysqli($servername, $username, $password, $dbname);
			$stmt4 = mysqli_prepare($bdd2, 'SELECT imei, modele, libelle FROM kit ORDER BY idKit DESC');
			mysqli_stmt_execute($stmt4);
			mysqli_stmt_bind_result($stmt4, $donnees['imei'], $donnees['modele'], $donnees['libelle']);

			while (mysqli_stmt_fetch($stmt4)) {
				$data[$nbkits] = $donnees['imei'] . ";" . $donnees['modele'] . ";" . $donnees['libelle'];
				$nbkits++;
			}


			$pagesTotales = ceil($nbkits / $kitsParPage);
			if (isset($_GET['page'])  and !empty($_GET['page'])  and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			} else {
				$pageCourante = 1;
			}

			if ($nbkits > 0) {
			?>
				<div align="left">
					<section class="cart bgwhite p-t-5 p-b-5">
						<div class="container">
							<!-- Cart item -->
							<div class="container-table-cart pos-relative">
								<div class="wrap-table-shopping-cart bgwhite">
									<table class="table-shopping-cart table-hover ">
										<tr class="table-head" style="background-color:#00FFBF;">
											<th style="width:25%;text-align:left" class="column-1">Nom</th>
											<th style="width:25%;text-align:left" class="column-2">Modèle</th>
											<th style="width:25%;text-align:left" class="column-3">IMEI</th>
											<th style="width:25%;text-align:left" class="column-4">Action</th>
										</tr>
										<?php

										foreach ($data as $value) {
											$tab = explode(";", $value);
										?>
											<tr class="table-row">
												<td class="column-1"><?php echo $tab[1];  ?></td>
												<td class="column-2"><?php echo $tab[2];  ?></td>
												<td class="column-3"><?php echo $tab[0];  ?> </td>
												<td class="column-4">
													<a href="deleteKit.php?imei=<?php echo $tab[0]; ?>"><button type="button" class="btn btn-outline-danger"><i style="float: left;" class="fa fa-trash-o"></i> Supprimer </button></a>
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
										<a href="listeKitsAdmin.php?page=<?php echo $nump ?>" class="item-pagination flex-c-m trans-0-4"><?php echo $nump ?></a>
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
							La liste de kits est vide !
						</div>
					</div>
				</section>
			<?php } ?>
		</div>
	</div>

	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="libs/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="libs/js/main.js"></script>

</body>

</html>