<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Messagerie</title>
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
	require "header3.php";
	$idmess = $_GET['id'];
	if ($idmess !== NULL) {
		$cpt = 1;
		$bdd4 = new mysqli($servername, $username, $password, $dbname);
		$stmt4 = mysqli_prepare($bdd4, 'DELETE FROM message WHERE id = ? LIMIT 1');
		mysqli_stmt_bind_param($stmt4, "i", $idmess);
		mysqli_stmt_execute($stmt4);
		mysqli_close($bdd4);
	}
	?>

	<div class="card text-center">
		<div class="card-header">
			Messagerie
		</div>
		<div align="center" class="card-body">

			<?php

			$articlesParPage = 5;


			$stmt2 = mysqli_query($bdd, 'SELECT  id  FROM message ');
			mysqli_stmt_execute($stmt2);
			$articlesTotal = mysqli_num_rows($stmt2);

			$pagesTotales = ceil($articlesTotal / $articlesParPage);

			if (isset($_GET['page'])  and !empty($_GET['page'])  and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			} else {
				$pageCourante = 1;
			}

			$depart = ($pageCourante - 1) * $articlesParPage;

			if ($articlesTotal > 0) {


				$stmt = mysqli_prepare($bdd, 'SELECT id,  mailEx , nomEx , date , contenu , lu   FROM message ORDER BY id DESC  LIMIT ? , ?');
				mysqli_stmt_bind_param($stmt, "ii", $depart, $articlesParPage);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $donnees['id'], $donnees['mailEx'], $donnees['nomEx'], $donnees['date'], $donnees['contenu'], $donnees['lu']);




			?>
				<section class="cart bgwhite p-t-5 p-b-5 col-md-10">
					<div class="container">
						<!-- Cart item -->
						<div class="container-table-cart pos-relative">
							<div class="wrap-table-shopping-cart bgwhite">
								<table class="table-shopping-cart table-hover">

									<tr class="table-head" style="background-color:#AED6F1  ;">

										<th style=" width: 25% " class="column-1">Nom de l'expiditeur</th>
										<th style=" width: 25% " class="column-2">Email de l'expiditeur</th>
										<th style=" width: 25% " class="column-3">Date/Heure</th>
										<th style=" width: 25% " class="column-4">Action</th>

									</tr>



									<?php


									$n = 0;
									while (mysqli_stmt_fetch($stmt)) {

									?>

										<tr align="left" class="table-row">



											<td class="column-1"><?php echo $donnees['nomEx'];  ?></td>

											<td class="column-2"><?php echo $donnees['mailEx'];  ?></td>
											<td class="column-3"><?php echo $donnees['date'];  ?></td>
											<td class="column-4">
												<?php
												$id[$n] = $donnees['id'];
												$nomEx[$n] =  $donnees['nomEx'];
												$mailEx[$n] =  $donnees['mailEx'];
												$message[$n] = $donnees['contenu'];
												?>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $n; ?>" data-whatever="@mdo"> <i class="fa fa-eye"></i></button>
												<a href="messagerie.php?id=<?= $id[$n]  ?>"> <button type="button" class="btn btn-danger"> <i class="fa fa-trash-o"></i> </button> </a>

												<div class="modal fade" id="<?php echo $n; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="<?php echo $nomEx[$n] ?>"><?php echo $nomEx[$n];  ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form>
																	<div class="form-group">
																		<label for="recipient-name" class="col-form-label">Email :</label>
																		<input disabled type="text" class="form-control" id="<?php echo $mailEx[$n];  ?>" value="<?php echo $mailEx[$n];  ?>">
																	</div>
																	<div class="form-group">
																		<label for="message-text" class="col-form-label">Message :</label>
																		<div class="form-control" id="<?php echo $message[$n]; ?>"><?php echo $message[$n]; ?></div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</td>
										</tr>
									<?php
										$n++;
									}
									mysqli_close($bdd);
									?>
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
									<a href="messagerie.php?page=<?php echo $nump ?>" class="item-pagination flex-c-m trans-0-4"><?php echo $nump ?></a>
							<?php
								}
							}
							?>
						</div>
					</div>
				</section>
			<?php
			} else {
			?>
				<section class="cart bgwhite p-t-30 p-b-100">
					<div class="container">
						<div align="center" class="alert alert-warning" role="alert">
							Votre messagerie est vide pour le moment <a href="pboutique.php" class="alert-link"> </a>
						</div>
					</div>
				</section>
			<?php
			}
			?>
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