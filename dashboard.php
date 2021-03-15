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
	<link rel="stylesheet" type="text/css" href="libs\fonts\fontawesome-free-5.15.2-web\css\all.min.css">
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
	<link rel="stylesheet" href="libs/vendor/linearicons/style.css">
	<link rel="stylesheet" href="libs/vendor/chartist/css/chartist-custom.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<style>
		.table-striped tr{
			height:3.4em !important;
		}
		.table-striped{
			background-color:white !important;
		}
	</style>

</head>

<body class="animsition">
	<?php require "header2.php"; ?>
	<div class="main-content">
		<div align="center" class="container-fluid">
			<!-- OVERVIEW -->
			<h1 style="font-size:30px" class="panel-title">Dashboard</h1>
			
			<div class="buttons" style="margin:.5em">
				<button type="button" class="btn btn-success" id="buttonOctave" onclick="octaveCall(inverseTodo())"><i class="fa fa-play" aria-hidden="true"></i> Capture</button>
				<button type="button" class="btn btn-danger" onclick="inverseTodo()"><i class="fa fa-stop" aria-hidden="true"></i> Arrêter</button>
			</div>

			<div class="row col-md-12" style="display:flex;justify-content:center;align-items:center">
				<div class="panel-heading col-md-6">
					<div class="alert alert-primary" role="alert">
						<h4 class="alert-heading">Informations sur le kit</h4>
						<hr>
						<div align="left">
							<p class="panel-subtitle" id="date"><b>Dérnière connexion :</b> </p>
							<p class="panel-subtitle" id="idd"><b>ID : </b></p>
							<p class="panel-subtitle" id="deviceName"><b>Nom du device: </b></p>
							<p class="panel-subtitle" id="fsn"><b>Numéro de série : </b></p>
							<p class="panel-subtitle" id="imei"><b>IMEI : </b></p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<!-- RECENT PURCHASES -->
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
									<span class="number" id="percent" style="background-color:white !important;">0%</span>
									<span class="title">Batterie</span>
								</p>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fas fa-temperature-low"></i></span>
								<p>
									<span class="number" id="temperatureC">1,252 C°</span>
									<span class="title">Température</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fas fa-water"></i></span>
								<p>
									<span class="number" id="humidite">50.21 %</span>
									<span class="title">Humidité</span>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-eye"></i></span>
								<p>
									<span class="number" id="pression">1.01 Atm</span>
									<span class="title">Pression</span>
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
	
	<div class="row col-md-12">
		<div class="col-md-6">
			<!-- MULTI CHARTS -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Projection vs. Realization</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<div id="visits-trends-chart" class="ct-chart"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Website Visits</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<div id="visits-chart" class="ct-chart"></div>
				</div>
			</div>
		</div>
	</div>
				
				<!-- REALTIME CHART -->
				<!-- <div class="col-md-4">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">System Load</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<div id="system-load" class="easy-pie-chart" data-percent="70">
								<span class="percent">70</span>
							</div>
							<h4>CPU Load</h4>
							<ul class="list-unstyled list-justify">
								<li>High: <span>95%</span></li>
								<li>Average: <span>87%</span></li>
								<li>Low: <span>20%</span></li>
								<li>Threads: <span>996</span></li>
								<li>Processes: <span>259</span></li>
							</ul>
						</div>
					</div> -->
					<!-- END REALTIME CHART -->
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
		var tempValues, options;

		// headline charts
		tempValues = {
			labels: [],
			series: [[
			],]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: true,
			showPoint: true,
			fullWidth: true,
			axisX: {showGrid: true},
			lineSmooth: true,
		};
		
		new Chartist.Line('#headline-chart', tempValues, options);

		$(function() {
			
			// visits trend charts
			data = {
				labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'],
				series: [{
					name: 'series-real',
					data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
				}, {
					name: 'series-projection',
					data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
				}]
			};

			options = {
				fullWidth: true,
				lineSmooth: false,
				height: "270px",
				low: 0,
				high: 'auto',
				series: {
					'series-projection': {
						showArea: true,
						showPoint: false,
						showLine: false
					},
				},
				axisX: {
					showGrid: false,

				},
				axisY: {
					showGrid: false,
					onlyInteger: true,
					offset: 0,
				},
				chartPadding: {
					left: 20,
					right: 20
				}
			};

			new Chartist.Line('#visits-trends-chart', data, options);


			// visits chart
			data = {
				labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
				series: [
					[6384, 6342, 5437, 2764, 3958, 5068, 7654]
				]
			};

			options = {
				height: 300,
				axisX: {
					showGrid: false
				},
			};

			new Chartist.Bar('#visits-chart', data, options);
			
			
		});
		
		var sysLoad = $('#system-load').easyPieChart({
			size: 50,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * (1.1 - percent / 200)) + ", " + Math.round(200 * percent / 100) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245)',
			scaleColor: false,
			lineWidth: 7,
			animate: 500
		});
		
		//get device informations here 

		function convertTempFtoC(f) {
			return (5 / 9) * (f - 32)
		}

		function convertPascaltoAtm(f) {
			return f * 0.000009869
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
						$("#percent").text(battery+"%");
						sysLoad.data('easyPieChart').update(battery);
						new Chartist.Line('#headline-chart', tempValues, options);
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

					document.getElementById("temperatureC").innerHTML = convertTempFtoC((getSummary["/imu/temp/value"].v)).toFixed(2) + " C°";
					document.getElementById("pression").innerHTML = convertPascaltoAtm(JSON.parse(getSummary["/environment/value"].s).pressure).toFixed(2) + " Atm";
					document.getElementById("humidite").innerHTML = JSON.parse(getSummary["/environment/value"].s).humidity.toFixed(2) + " %";
					document.getElementById("redLED").innerHTML = getSummary["/leds/tri/red/enable"].v;
					document.getElementById("greenLED").innerHTML = getSummary["/leds/tri/green/enable"].v;
					document.getElementById("blueLED").innerHTML = getSummary["/leds/tri/blue/enable"].v;

					let dateMajLed =  new Date(getSummary["/leds/tri/red/enable"].ts)
					
					document.getElementById("redLEDTime").innerHTML = dateMajLed.toLocaleDateString("fr-FR") + " - " + dateMajLed.toLocaleTimeString();
					document.getElementById("greenLEDTime").innerHTML = dateMajLed.toLocaleDateString("fr-FR") + " - " + dateMajLed.toLocaleTimeString();
					document.getElementById("blueLEDTime").innerHTML = dateMajLed.toLocaleDateString("fr-FR") + " - " + dateMajLed.toLocaleTimeString();

					try {
						if (tempValues.series[0].length < 20){
							tempValues.series[0].push(convertTempFtoC(getSummary["/imu/temp/value"].v).toFixed(2));
							tempValues.labels.push(new Date(getSummary["/imu/temp/value"].ts).toLocaleTimeString());
						}else{
							tempValues.series[0].splice(0,1);
							tempValues.labels.splice(0,1);
							tempValues.series[0].push(convertTempFtoC(getSummary["/imu/temp/value"].v).toFixed(2));
							tempValues.labels.push(new Date(getSummary["/imu/temp/value"].ts).toLocaleTimeString());
						}
					} catch (error) {
						//console.log(error);
					}
					console.log(tempValues);

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