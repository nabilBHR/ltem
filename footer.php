<?php
$erreur3 = "";
if (isset($_POST['contactadmin'])) {
	$nomExp = $_POST['nomExp'];
	$mailExp = $_POST['mailExp'];
	$messageExp = $_POST['messageExp'];
	date_default_timezone_set("Europe/Paris");
	$date = date("Y-m-d H:i:s");

	if (preg_match('#^[[:alpha:]]+([\-\' ][[:alpha:]]+)*$#', $nomExp)  && strlen($nomExp) < 51 && strlen($nomExp) > 2) {
		if (filter_var($mailExp, FILTER_VALIDATE_EMAIL)) {
			if (strlen($messageExp) < 501) {

				$bdd2 = new mysqli($servername, $username, $password, $dbname);
				$stmt2 = $bdd2->prepare("INSERT INTO message  ( mailEx , nomEx , date , contenu  ) VALUES (?, ?, ?, ?)");
				$stmt2->bind_param("ssss", $mailExp, $nomExp, $date, $messageExp);
				$stmt2->execute();


				$erreur3 = "<div align='center' class='alert alert-success' role='alert'>
						<strong> Votre message est envoyé !</strong>
						</div>";
			} else {
				$erreur3 = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Votre message est trop long !</strong>
				</div>';
			}
		} else {
			$erreur3 = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Adresse email invalide !</strong>
			</div>';
		}
	} else {
		$erreur3 = '<div align="center" class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Nom invalide !</strong>
		</div>';
	}
}
?>

<style>
	.myico {
		font-size: 24px;
	}

	footer p {
		font-size: 16px;
		color: black;
	}
</style>

<!-- Footer -->
<footer class="bg6 p-b-25 p-l-25 p-r-25" style=" background-color:#FF7900;  ">
	<div class="flex-w">
		<div class="w-size6 p-t-25 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				A propos de nous
			</h4>

			<div>

				<div class="col-lg-11 col-md-6">
					<div class="media">
						<div class="d-flex">
							<div class="icon-box col-md-3 col-sm-4"><i class="myico fa fa-map-marker"></i></div>
						</div>
						<div class="media-body">
							<p> Université Gustave Eiffel <br />5 Boulevard Descates, 77420, Champs-sur-marne, FR </p>
						</div>
					</div>
				</div>

				<hr>

				<div class="col-lg-10 col-md-6">
					<div class="media">
						<div class="d-flex">
							<div class="icon-box col-md-3 col-sm-4"><i class="myico fa fa-phone"></i></div>
						</div>
						<div class="media-body">
							<a href="tel:+33649789816">
								<p>0649789816</p>
							</a>
							<a href="tel:+33636115370">
								<p>0636115370</p>
							</a>
							<a href="tel:+33749291613">
								<p>0749291613</p>
							</a>
						</div>
					</div>
				</div>

				<hr>

				<div class="col-lg-10 col-md-6">
					<div class="media">
						<div class="d-flex">
							<div class="icon-box col-md-3 col-sm-4"><i class="myico fa fa-envelope"></i></a></div>
						</div>
						<div class="media-body">
							<a href="mailto:busines@persuit.com">
								<p>mouheb@etud.u-pem.fr</p>
							</a>
							<a href="mailto:busines@persuit.com">
								<p>yhadjar@etud.u-pem.fr</p>
							</a>
							<a href="mailto:support@persuit.com">
								<p>nbouhar@etud.u-pem.fr</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="w-size8 p-t-25 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				Nos solutions
			</h4>

			<div class="col-lg-10 col-md-6">
				<div class="media">
					<div class="d-flex">
						<div class="icon-box col-md-3 col-sm-4"><i class="myico fa fa-connectdevelop"></i></div>
					</div>
					<div class="media-body">
						<a href="#">
							<p>Internet des Objets</p>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="col-lg-10 col-md-6">
				<div class="media">
					<div class="d-flex">
						<div class="icon-box col-md-3 col-sm-4"><i class="myico fa fa-cloud"></i></div>
					</div>
					<div class="media-body">
						<a href="#">
							<p>Cloud</p>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="col-lg-10 col-md-6">
				<div class="media">
					<div class="d-flex">
						<div class="icon-box col-md-3 col-sm-4"><i class="myico fa fa-home"></i></div>
					</div>
					<div class="media-body">
						<a href="#">
							<p>Domotique</p>
						</a>
					</div>
				</div>
			</div>

		</div>

		<div id="cad" class="w-size8 p-t-25 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				Probleme technique ? <br>
				Contactez l'administrateur !
			</h4>

			<form class="leave-comment" method="post" action="#cad">
				<?php
				echo $erreur3;
				$erreur3 = "";
				?>
				<div class="bo4 of-hidden size15 m-b-20">
					<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nomExp" placeholder="Nom" required='required'>
				</div>
				<div class="bo4 of-hidden size15 m-b-20">
					<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="mailExp" placeholder="Email" required='required'>
				</div>
				<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="messageExp" placeholder="Message" required='required'></textarea>

				<div class="w-size25">
					<button type="submit" name="contactadmin" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
						Envoyer
					</button>
				</div>

			</form>
		</div>
	</div>

</footer>

<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>