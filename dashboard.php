<!DOCTYPE html>
<html lang="fr">

<head>

	<title>DashBoard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="libs/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="libs/fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="libs/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="libs/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel=" stylesheet" type="text/css" href="libs/fonts/elegant-font/html-css/style.css">
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
	<link rel="stylesheet" href="libs/vendor/linearicons/style.css">
	<link rel="stylesheet" href="libs/vendor/chartist/css/chartist-custom.css">
	<link rel="stylesheet" href="libs/css/dashboard.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
		.table-striped tr {}

		.table-striped {
			background-color: white !important;
			box-shadow: 0 2px 6px rgb(0 0 0 / 8%);
		}

		.myicon {
			float: left;
			width: 50px;
			height: 50px;
			line-height: 50px;
			text-align: center;
		}
	</style>

</head>

<body class="animsition">
	<?php require "header2.php"; ?>
	<div class="main-content m-t-80">
		<div align="center" class="container-fluid">
			<!-- OVERVIEW -->
			<h1 style="font-size:30px" class="panel-title">Dashboard</h1>

			<div class="buttons" style="margin:.5em">
				<button type="button" class="btn btn-success" id="buttonOctave" onclick="octaveCall(inverseTodo())"><i class="fa fa-play" aria-hidden="true"></i> Capture</button>
				<button type="button" class="btn btn-danger" onclick="inverseTodo()"><i class="fa fa-stop" aria-hidden="true"></i> Arrêter</button>
			</div>

			<div class="row" style="display:flex;justify-content:center;align-items:center">
				<div class="panel-heading col-xl-6 col-lg-12 col-md-12">
					<div class="alert alert-primary" role="alert">
						<h4 class="alert-heading">Informations sur le kit</h4>
						<hr>
						<div class="row p-0 col-12">
							<div class="col p-0 col-md-6 col-sm-12 col-12" align="left">
								<h5> Général :</h5>
								<p class="panel-subtitle" id="date"><b>Dérnière connexion :</b> </p>
								<p class="panel-subtitle" id="idd"><b>ID : </b></p>
								<p class="panel-subtitle" id="deviceName"><b>Nom du device: </b></p>

								<h5> Hardware :</h5>
								<p class="panel-subtitle" id="fsn"><b>Numéro de série : </b></p>
								<p class="panel-subtitle" id="imei"><b>IMEI : </b></p>
							</div>
							<div class="col p-0 col-md-6 col-sm-12 col-12" align="left">
								<h5> Réseau :</h5>
								<p><b>Rat. : </b><span class="panel-subtitle" id="rat"></span></p>
								<p><b>Status : </b><span class="panel-subtitle" id="status"></span></p>
								<p><b>Niveau du signal : </b><span class="panel-subtitle" id="rxLevel"></span></p>
								<h5> Version Locale :</h5>
								<p><b>Firmware : </b><span class="panel-subtitle" id="firmware"></span></p>
								<p><b>Version : </b><span class="panel-subtitle" id="version"></span></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-12 col-md-12">
					<!-- RECENT PURCHASES -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Etat des LEDs</h3>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>LED</th>
									<th>Date MAJ</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Rouge</td>
									<td><span id="redLEDTime" class="label label-warning">-</td>
									<td><span id="redLED" class="label label-success">-</span></td>
								</tr>
								<tr>
									<td>Verte</td>
									<td><span id="greenLEDTime" class="label label-warning">-</td>
									<td><span id="greenLED" class="label label-warning">-</span></td>
								</tr>
								<tr>
									<td>Bleue</td>
									<td><span id="blueLEDTime" class="label label-warning">-</td>
									<td><span id="blueLED" class="label label-danger">-</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="panel panel-headline">
				<br>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="metric">
								<span style="border-radius: 50%;float: left;width: 50px;height: 50px;line-height: 50px;background-color: white;text-align: center;">
									<div id="system-load" class="easy-pie-chart" data-percent="0"></div>
								</span>
								<p>
									<span class="number" id="percent" style="background-color:white !important;">- %</span>
									<span class="title">Batterie</span>
								</p>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<img class="myicon" src="images/icons/centigrade.png" />
								<p>
									<span class="number" id="temperatureC">- C°</span>
									<span class="title">Température</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<img class="myicon" src="images/icons/humidity.png" />
								<p>
									<span class="number" id="humidite">- %</span>
									<span class="title">Humidité</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<img class="myicon" src="images/icons/atmospheric.png" />
								<p>
									<span class="number" id="pression"> - mb</span>
									<span class="title">Pression</span>
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="metric">
								<img class="myicon" src="images/icons/air-quality.png" />
								<p>
									<span class="number" id="co2"> - </span>
									<span class="title">CO2</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<img class="myicon" src="images/icons/breath.png" />
								<p>
									<span class="number" id="airqualite"> - </span>
									<span class="title">iaq</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<img class="myicon" src="images/icons/sunlight.png" />
								<p>
									<span class="number" id="light"> - %</span>
									<span class="title">Lumière</span>
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div id="headline-chart" class="ct-chart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- END MAIN CONTENT -->
	<?php require "footer.php" ?>

	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="libs/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="libs/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="libs/js/main.js"></script>
	<!--===============================================================================================-->
	<script src="libs/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="libs/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="libs/vendor/chartist/js/chartist.min.js"></script>
	<script src="libs/scripts/klorofil-common.js"></script>

	<script>
		var battery;
		var todo = false;

		// headline charts
		var tempValues = {
			labels: [],
			series: [
				[],
			]
		};

		var optionsTempChart = {
			height: 300,
			showLine: true,
			showPoint: true,
			fullWidth: true,
			axisX: {
				showGrid: true
			},
			axisY: {
				showGrid: true
			},
			lineSmooth: true,
			showArea: true,
			chartPadding: {
				left: 60,
				right: 60
			},
		};

		new Chartist.Line('#headline-chart', tempValues, optionsTempChart);

		var sysLoad = $('#system-load').easyPieChart({
			size: 50,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * (1.1 - percent / 200)) + ", " + Math.round(200 * percent / 100) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245)',
			scaleColor: false,
			lineWidth: 7,
			animate: 800
		});

		//get device informations here 

		function convertTempFtoC(f) {
			return (5 / 9) * (f - 32)
		}

		function convertPascal(f) {
			return f * 0.01
		}

		function inverseTodo() {
			document.getElementById("buttonOctave").disabled = false;
			return todo = !todo;
		}

		function delay(delayInms) {
			return new Promise(resolve => {
				setTimeout(() => {
					if (todo) {
						octaveCall(todo);
						$("#percent").text(battery + "%");
						sysLoad.data('easyPieChart').update(battery);
						new Chartist.Line('#headline-chart', tempValues, optionsTempChart);
					}
				}, delayInms);
			});
		}

		async function octaveCall(todo) {
			document.getElementById("buttonOctave").disabled = true;
			var companyName = "universit_gustave_eiffel";
			var dID = "d6048d14e337dab5dbbb15059";
			var getValues = {};

			$.ajax({
				url: "https://octave-api.sierrawireless.io/v5.0/" + companyName + "/device/" + dID,
				headers: {
					'X-Auth-User': 'yacine_hadjar',
					'X-Auth-Token': 'shAixQsXspB5bJ6LpKBCD6myetVX86po',
				},
				type: "GET",
				cache: false,
				success: function(data, textStatus, request) {

					getValues = data.body;
					getSummary = getValues.summary;
					battery = JSON.parse(getSummary["/battery/value"].s).percent;
					document.getElementById("idd").innerHTML = "<b>ID : </b>" + getValues.id;
					document.getElementById("deviceName").innerHTML = "<b>Nom du device: </b>" + getValues.name;
					document.getElementById("date").innerHTML = "<b>Dérnière connexion :</b>" + new Date(getValues.lastSeen).toLocaleDateString("fr-FR") + " " + new Date(getValues.lastSeen).toLocaleTimeString();
					//console.log(getSummary["/leds/tri/red/enable"].v + " " + getSummary["/leds/tri/green/enable"].v + " " + getSummary["/leds/tri/blue/enable"].v);
					document.getElementById("imei").innerHTML = "<b>IMEI : </b>" + getValues.hardware.imei;
					document.getElementById("fsn").innerHTML = "<b>Numéro de série : </b>" + getValues.hardware.fsn;

					document.getElementById("temperatureC").innerHTML = JSON.parse(getSummary["/environment/value"].v).temperature.toFixed(2) + " C°";
					document.getElementById("pression").innerHTML = convertPascal(JSON.parse(getSummary["/environment/value"].v).pressure).toFixed(0) + " mb";
					document.getElementById("humidite").innerHTML = JSON.parse(getSummary["/environment/value"].v).humidity.toFixed(2) + " %";
					document.getElementById("co2").innerHTML = JSON.parse(getSummary["/environment/value"].v).co2EquivalentValue.toFixed(2) + " ";
					document.getElementById("airqualite").innerHTML = JSON.parse(getSummary["/environment/value"].v).iaqValue.toFixed(2);
					document.getElementById("light").innerHTML = (getSummary["/light/value"].v * 100).toFixed(2) + " %";
					document.getElementById("redLED").innerHTML = getSummary["/leds/tri/red/enable"].v;
					document.getElementById("greenLED").innerHTML = getSummary["/leds/tri/green/enable"].v;
					document.getElementById("blueLED").innerHTML = getSummary["/leds/tri/blue/enable"].v;

					document.getElementById("rat").innerHTML = getValues.report.signal.rat.value;
					document.getElementById("status").innerHTML = JSON.parse(getSummary["/util/cellular/signal/value"].v).status;
					document.getElementById("rxLevel").innerHTML = getValues.report.signal.strength.value;

					document.getElementById("firmware").innerHTML = getValues.localVersions.firmware;
					document.getElementById("version").innerHTML = getValues.localVersions.edge;

					let dateMajLed = new Date(getSummary["/leds/tri/red/enable"].ts)

					document.getElementById("redLEDTime").innerHTML = dateMajLed.toLocaleDateString("fr-FR") + " - " + dateMajLed.toLocaleTimeString();
					document.getElementById("greenLEDTime").innerHTML = dateMajLed.toLocaleDateString("fr-FR") + " - " + dateMajLed.toLocaleTimeString();
					document.getElementById("blueLEDTime").innerHTML = dateMajLed.toLocaleDateString("fr-FR") + " - " + dateMajLed.toLocaleTimeString();

					try {
						if (tempValues.series[0].length < 17) {
							tempValues.series[0].push(JSON.parse(getSummary["/environment/value"].v).temperature.toFixed(2));
							tempValues.labels.push(new Date(getSummary["/environment/value"].ts).toLocaleTimeString());
						} else {
							tempValues.series[0].splice(0, 1);
							tempValues.labels.splice(0, 1);
							tempValues.series[0].push(JSON.parse(getSummary["/environment/value"].v).temperature.toFixed(2));
							tempValues.labels.push(new Date(getSummary["/environment/value"].ts).toLocaleTimeString());
						}
					} catch (error) {
						//console.log(error);
					}
				},
				error: function(request, textStatus, errorThrown) {
					alert(request.getResponseHeader('some_header'));
					console.log("error");
				}
			})
			let delayRes = await delay(1000);
		}
	</script>

</body>

</html>