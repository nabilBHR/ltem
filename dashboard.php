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
	<?php 
        if(isset($_POST['myInfo']) && ($_POST['myInfo']!="")){
            $file = 'myKitData.json';
            $current = file_get_contents($file);
            if($current==null){
                file_put_contents($file, "[]");
                $current = file_get_contents($file);
            }
            $tempArray = json_decode($current);
            array_push($tempArray ,json_decode($_POST['myInfo']));
            $jsonData = json_encode($tempArray);
            file_put_contents($file, $jsonData);
        }
		if(isset($_POST['batteryInfo']) && ($_POST['batteryInfo']!="")){
            $file = 'batteryInfo.json';
            $current = file_get_contents($file);
            if($current==null){
                file_put_contents($file, "[]");
                $current = file_get_contents($file);
            }
            $tempArray = json_decode($current);
            array_push($tempArray ,json_decode($_POST['batteryInfo']));
            $jsonData = json_encode($tempArray);
            file_put_contents($file, $jsonData);
        }
    ?>
	<div class="main-content m-t-80">
		<div align="center" class="container-fluid">
			<!-- OVERVIEW -->
			<h1 style="font-size:30px" class="panel-title">Dashboard</h1>

			<div class="buttons" style="margin:.5em">
				<button type="button" class="btn btn-success" id="buttonOctave" onclick="octaveCall(inverseTodo());dataDashboard()"><i class="fa fa-play" aria-hidden="true"></i> Capture</button>
				<button type="button" class="btn btn-danger" id="stopOctave" onclick="inverseTodo()"><i class="fa fa-stop" aria-hidden="true"></i> Arrêter</button>
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
								<p>
									<b>Niveau du signal : </b>
									<span style="display: inline-flex;align-items: baseline;">
										<span class="panel-subtitle" id="rxLevel"></span>
										<img id="signalIcon" style="width:20px; margin-left:20px"></span>
									</span>
								</p>	
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
			<form action="<?=$_SERVER['dashboard'];?>" method="post" id="myForm" name="myForm" hidden>
				<input type="text" name="temp" id="temp"/>
				<input type="submit" id="trans">
        	</form>
			<form action="<?=$_SERVER['dashboard'];?>" method="post" id="myFormBattery" name="myFormBattery" hidden>
				<input type="text" name="battery" id="battery"/>
				<input type="submit" id="send">
        	</form>
			<div class="panel panel-headline p-0">
				<br>
				<div class="panel-body p-0">
					<div class="row">
						<div class="col-md-4 col-xl-3">
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
						<div class="col-md-4 col-xl-3">
							<div class="metric">
								<img class="myicon" src="images/icons/centigrade.png" />
								<p>
									<span class="number" id="temperatureC">- C°</span>
									<span class="title">Température</span>
								</p>
							</div>
						</div>
						<div class="col-md-4 col-xl-3">
							<div class="metric">
								<img class="myicon" src="images/icons/humidity.png" />
								<p>
									<span class="number" id="humidite">- %</span>
									<span class="title">Humidité</span>
								</p>
							</div>
						</div>
						<div class="col-md-4 col-xl-3">
							<div class="metric">
								<img class="myicon" src="images/icons/atmospheric.png" />
								<p>
									<span class="number" id="pression"> - mb</span>
									<span class="title">Pression</span>
								</p>
							</div>
						</div>
						<div class="col-md-4 col-xl-3">
							<div class="metric pb-0">
								<img class="myicon" src="images/icons/air-quality.png" />
								<p>
									<span class="number" id="co2"> - </span>
									<span class="title">CO2</span>
									<span id="co2-chart-container"></span>
								</p>
							</div>
						</div>
						<div class="col-md-4 col-xl-3">
							<div class="metric pb-0">
								<img class="myicon" src="images/icons/breath.png" />
								<p>
									<span class="number" id="airqualite"> - </span>
									<span class="title">iaq</span>
									<span id="iaq-chart-container"></span>
								</p>
							</div>
						</div>
						<div class="col-md-4 col-xl-3">
							<div class="metric">
								<img class="myicon" src="images/icons/sunlight.png" />
								<p>
									<span class="number" id="light"> - %</span>
									<span class="title">Lumière</span>
								</p>
							</div>
						</div>
					</div>
					</div>
					<div class="panel">
						<div class="panel-heading"><h3>Temperature</h3></div>
						<div>
							<div class="col-md-11 col-11 p-0 m-auto p-0">
								<div id="headline-chart" class="ct-chart"></div>
								<div>T(1s)</div>
							</div>
						</div>
					</div>	
					<div class="panel">
						<div class="panel-heading"><h3>Batterie</h3>
						<div>Durée d'utilisation estimée : <b id="timeEstimation"></b></div></div>
						<div>
							<div class="col-md-11 col-11 p-0 m-auto p-0">
								<div id="battery-chart" class="ct-chart"></div>
								
							</div>
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
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

	<script>
		var battery;
		var co2 = "0";
		var iaq = "0";

		var todo = false;
		document.getElementById("stopOctave").disabled = true;

		// headline charts
		var tempValues = {
			labels: ["t(s)"],
			series: [
				[],
			]
		};

		var batteryValues = {
			labels: ["t(5s)"],
			series: [
				[],
			]
		};

		var optionsTempChart = {
			height: 300,
			showLine: true,
		    showLabel: false,
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
				left: 0,
				right: 0
			},
		};

		var optionsBatteryChart = {
			height: 300,
			showLine: true,
		    showLabel: false,
			showPoint: false,
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
				left: 10,
				right: 10
			},
		};

		new Chartist.Line('#headline-chart', tempValues, optionsTempChart);
		new Chartist.Line('#battery-chart', batteryValues, optionsBatteryChart);

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
			document.getElementById("stopOctave").disabled = true;
			return todo = !todo;
		}

		const dataSource = {
			chart: {
				theme: "fusion",
				showvalue: "0",
				pointerbghovercolor: "#ffffff",
				pointerbghoveralpha: "80",
				pointerhoverradius: "12",
				showborderonhover: "1",
				pointerborderhovercolor: "#000",
				pointerborderhoverthickness: "2",
				showtickmarks: "0",
				numbersuffix: "%"
			},
			colorrange: {
				color: [
				{
					minvalue: "0",
					maxvalue: "40",
					label: "Low",
					code: "#6baa01"
				},
				{
					minvalue: "40",
					maxvalue: "80",
					label: "Moderate",
					code: "#f8bd19"
				},
				{
					minvalue: "80",
					maxvalue: "110",
					label: "High",
					code: "#e44a00"
				}
				]
			},
			pointers: {
				pointer: [
				{	
					id:"iaq",
					value: iaq,
				}
				]
			}
		};

		
		const dataSource2 = {
			chart: {
				theme: "fusion",
				showvalue: "0",
				pointerbghovercolor: "#ffffff",
				pointerbghoveralpha: "80",
				pointerhoverradius: "12",
				showborderonhover: "1",
				pointerborderhovercolor: "#000",
				pointerborderhoverthickness: "2",
				showtickmarks: "0",
				numbersuffix: "%"
			},
			colorrange: {
				color: [
				{
					minvalue: "300",
					maxvalue: "1000",
					label: "Low",
					code: "#6baa01"
				},
				{
					minvalue: "1000",
					maxvalue: "2500",
					label: "Moderate",
					code: "#f8bd19"
				},
				{
					minvalue: "2500",
					maxvalue: "5000",
					label: "High",
					code: "#e44a00"
				}
				]
			},
			pointers: {
				pointer: [
				{
					id:"co2",
					value: co2,
				}
				]
			}
		};

		FusionCharts.ready(function() {
			var iaqGauge = new FusionCharts({type: "hlineargauge",
				renderAt: "iaq-chart-container",width: "100%",height: "30%",dataFormat: "json", dataSource, id:"iaqChart" 
			}).render();
		
			var co2Gauge = new FusionCharts({type: "hlineargauge",
				renderAt: "co2-chart-container",width: "100%",height: "25%",dataFormat: "json",dataSource:dataSource2, id:"co2Chart"
			}).render();
		});

		function delay(delayInms) {
			return new Promise(resolve => {
				setTimeout(() => {
					if (todo) {
						octaveCall(todo);
						$("#percent").text(battery + "%");
						sysLoad.data('easyPieChart').update(battery);
						new Chartist.Line('#headline-chart', tempValues, optionsTempChart);
						FusionCharts.items["iaqChart"].setDataForId("iaq", iaq);
						FusionCharts.items["co2Chart"].setDataForId("co2", co2);
					}
				}, delayInms);
			});
		}
		
		var companyName = "universit_gustave_eiffel";
		var dID = "d6048d14e337dab5dbbb15059";
		
		async function octaveCall(todo) {
			document.getElementById("buttonOctave").disabled = true;
    		document.getElementById("stopOctave").disabled = false;
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
					
					battery = JSON.parse(getSummary["/battery/value"].v).percent;
					document.getElementById("idd").innerHTML = "<b>ID : </b>" + getValues.id;
					document.getElementById("deviceName").innerHTML = "<b>Nom du device: </b>" + getValues.name;
					document.getElementById("date").innerHTML = "<b>Dérnière connexion :</b>" + new Date(getValues.lastSeen).toLocaleDateString("fr-FR") + " " + new Date(getValues.lastSeen).toLocaleTimeString();
					document.getElementById("imei").innerHTML = "<b>IMEI : </b>" + getValues.hardware.imei;
					document.getElementById("fsn").innerHTML = "<b>Numéro de série : </b>" + getValues.hardware.fsn;

					document.getElementById("temperatureC").innerHTML = JSON.parse(getSummary["/environment/value"].v).temperature.toFixed(2) + " C°";
					document.getElementById("pression").innerHTML = convertPascal(JSON.parse(getSummary["/environment/value"].v).pressure).toFixed(0) + " mb";
					document.getElementById("humidite").innerHTML = JSON.parse(getSummary["/environment/value"].v).humidity.toFixed(2) + " %";
					co2 = JSON.parse(getSummary["/environment/value"].v).co2EquivalentValue.toFixed(2);
					document.getElementById("co2").innerHTML = co2 + " ";
					iaq = JSON.parse(getSummary["/environment/value"].v).iaqValue.toFixed(2);
					document.getElementById("airqualite").innerHTML = iaq;
					document.getElementById("light").innerHTML = (getSummary["/light/value"].v * 100).toFixed(2) + " %";
					
					document.getElementById("redLED").innerHTML = getSummary["/leds/tri/red/enable"].v;
					document.getElementById("greenLED").innerHTML = getSummary["/leds/tri/green/enable"].v;
					document.getElementById("blueLED").innerHTML = getSummary["/leds/tri/blue/enable"].v;

					document.getElementById("rat").innerHTML = getValues.report.signal.rat.value;
					document.getElementById("status").innerHTML = JSON.parse(getSummary["/util/cellular/signal/value"].v).status;
					let signalStrength = getValues.report.signal.strength.value;
					document.getElementById("rxLevel").innerHTML = signalStrength;
					if (signalStrength>(-79)){
						document.getElementById("signalIcon").src = "./images/signal_strength_icons/five.png";
					}else if(signalStrength<(-80) && signalStrength>(-89)){
						document.getElementById("signalIcon").src = "./images/signal_strength_icons/four.png";
					}else if(signalStrength<(-90) && signalStrength>(-99)){
						document.getElementById("signalIcon").src = "./images/signal_strength_icons/three.png";						
					}else if(signalStrength<(-100) && signalStrength>(-109)){
						document.getElementById("signalIcon").src = "./images/signal_strength_icons/two.png";
					}else if(signalStrength<(-110)){
						document.getElementById("signalIcon").src = "./images/signal_strength_icons/one.png";
					}
					document.getElementById("firmware").innerHTML = getValues.localVersions.firmware;
					document.getElementById("version").innerHTML = getValues.localVersions.edge;

					let dateMajLedR = new Date(getSummary["/leds/tri/red/enable"].ts)
					let dateMajLedG = new Date(getSummary["/leds/tri/green/enable"].ts)
					let dateMajLedB = new Date(getSummary["/leds/tri/blue/enable"].ts)
					
					document.getElementById("redLEDTime").innerHTML = dateMajLedR.toLocaleDateString("fr-FR") + " - " + dateMajLedR.toLocaleTimeString();
					document.getElementById("greenLEDTime").innerHTML = dateMajLedG.toLocaleDateString("fr-FR") + " - " + dateMajLedG.toLocaleTimeString();
					document.getElementById("blueLEDTime").innerHTML = dateMajLedB.toLocaleDateString("fr-FR") + " - " + dateMajLedB.toLocaleTimeString();

					try {
						if (tempValues.series[0].length < 10) {
							tempValues.series[0].push(JSON.parse(getSummary["/environment/value"].v).temperature.toFixed(2));
							//tempValues.labels.push(new Date(getSummary["/environment/value"].ts).toLocaleTimeString());
						} else {
							tempValues.series[0].splice(0, 1);
							//tempValues.labels.splice(0, 1);
							tempValues.series[0].push(JSON.parse(getSummary["/environment/value"].v).temperature.toFixed(2));
							//tempValues.labels.push(new Date(getSummary["/environment/value"].ts).toLocaleTimeString());
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

		// dataDashboard()
		async function dataDashboard(){
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
					summary = data.body.summary;

					let myHistory = {
						"date": new Date(),
						"temperature": JSON.parse(summary["/environment/value"].v).temperature.toFixed(2),
						"pression": convertPascal(JSON.parse(summary["/environment/value"].v).pressure).toFixed(0),
						"lumiere": (summary["/light/value"].v * 100).toFixed(2),
						"iaq":JSON.parse(summary["/environment/value"].v).iaqValue.toFixed(2)
					};

					let mAh = JSON.parse(summary["/battery/value"].v).mAh;
					let mA = JSON.parse(summary["/battery/value"].v).mA;

					let batteryHistory ={
						"health": JSON.parse(summary["/battery/value"].v).health,
						"percent": JSON.parse(summary["/battery/value"].v).percent,
						"mAh": mAh,
						"mA": mA,
						"degC": JSON.parse(summary["/battery/value"].v).degC,
						"time": new Date().toLocaleTimeString("fr-FR")
					}
					
					document.getElementById("timeEstimation").innerHTML = Math.abs(mAh/mA).toFixed(0)+"h"+((Math.abs(mAh/mA).toFixed(2)-Math.abs(mAh/mA).toFixed(0))*60).toFixed(0)+"min";
					//exportData(myHistory)
					exportDataBattery(batteryHistory)
					//$("#trans").click();
					$("#send").click();
					if (batteryValues.series[0].length < 100){
						batteryValues.series[0].push(mAh);
					}else{
						batteryValues.series[0].splice(0, 1);
						batteryValues.series[0].push(mAh);
					}
				},
				error: function(request, textStatus, errorThrown) {
					alert(request.getResponseHeader('some_header'));
					console.log("error");
				}
			})
			let delayRes = await delayDataDashboard(5000);
		}		

		function delayDataDashboard(delayRes) {
			return new Promise(resolve => {
				setTimeout(() => {
					//console.log(todo);
					if (todo) {
						dataDashboard();
						new Chartist.Line('#battery-chart', batteryValues, optionsBatteryChart);
					}
				}, delayRes);
			});
		}

		function exportData(x){
			//console.log(x);
			let content=JSON.stringify(x);
			document.getElementById("temp").value = content;
			submitData();
		}

		function exportDataBattery(x){
			//console.log(x);
			let content=JSON.stringify(x);
			document.getElementById("battery").value = content;
			submitBatteryData();
		}

		function submitData(){
			$('#myForm').submit(function(e){
				e.preventDefault();
				$.ajax({
					type: 'post',
					data:  {myInfo : document.getElementById("temp").value},
				});
			});
			// window.history.replaceState( null, null, window.location.href );
		}

		function submitBatteryData(){
			$('#myFormBattery').submit(function(e){
				e.preventDefault();
				$.ajax({
					type: 'post',
					data:  {batteryInfo : document.getElementById("battery").value},
				});
			});
			// window.history.replaceState( null, null, window.location.href );
		}

	</script>

</body>

</html>