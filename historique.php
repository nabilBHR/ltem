<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Historique</title>
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
    .ct-series-a .ct-bar {
        stroke-width: 50px;
        background-color :red;
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
    ?>
    <div>
        <div class="buttons d-flex justify-content-center p-t-80" style="margin:1.5em">
            <button type="button" class="btn btn-success m-r-7" id="buttonOctave" onclick="Dashboard(inverseTodo())"><i
                    class="fa fa-play" aria-hidden="true"></i> Capture</button>
            <button type="button" class="btn btn-danger m-l-7" id="stopOctave" onclick="inverseTodo()"><i class="fa fa-stop"
                    aria-hidden="true"></i> Arrêter</button>
        </div>

        <div class="row mt-4 col-12 d-flex justify-content-center m-0 p-0">
            <div class="col-md-5">
                <div class="metric bg-white">
                    <img class="myicon" src="images/icons/centigrade.png" />
                    <p>
                        <span class="number" id="temp"> - °C</span>
                        <span class="title">Température moyenne</span>
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="metric bg-white">
                    <img class="myicon" src="images/icons/atmospheric.png" />
                    <p>
                        <span class="number" id="pressur"> - mb</span>
                        <span class="title">Préssion moyenne</span>
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="metric bg-white">
                    <img class="myicon" src="images/icons/sunlight.png" />
                    <p>
                        <span class="number" id="light"> - %</span>
                        <span class="title">Lumière moyenne</span>
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="metric bg-white">
                    <img class="myicon" src="images/icons/breath.png" />
                    <p>
                        <span class="number" id="iaq"> - </span>
                        <span class="title">iaq moyen</span>
                    </p>
                </div>
            </div>
        </div>


        <div class="row col-12 d-flex justify-content-center m-0 p-0">
            <div class="col col-12 col-md-11 p-0">
                <div class="alert alert-light border border-secondary p-0">
                    <h4 class="alert-heading m-t-15 m-b-15 text-center">Historique temperature</h4>
                    <hr />
                    <div class="alert-body">
                        <div id="headline-chart" class="ct-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col col-12 col-md-11 p-0">
                <div class="alert alert-light border border-secondary p-0">
                    <h4 class="alert-heading m-t-15 m-b-15 text-center">Historique Préssion</h4>
                    <hr />
                    <div class="alert-body">
                        <div id="headline-chart-1" class="ct-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col col-12 col-md-11 p-0">
                <div class="alert alert-light border border-secondary p-0">
                    <h4 class="alert-heading m-t-15 m-b-15 text-center">Historique Lumière</h4>
                    <hr />
                    <div class="alert-body">
                        <div id="headline-chart-2" class="ct-chart"></div>
                    </div>
                </div>
            </div>

            <div class="col col-12 col-md-11 p-0">
                <div class="alert alert-light border border-secondary p-0">
                    <h4 class="alert-heading m-t-15 m-b-15 text-center">Historique iAQ</h4>
                    <hr />
                    <div class="alert-body">
                        <div id="headline-chart-3" class="ct-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?=$_SERVER['historique'];?>" method="post" id="myForm" name="myForm" hidden>
            <input type="text" name="temp" id="temp"/>
            <input type="submit" id="trans">
        </form>
    </div>
    <?php require "footer.php" ?>

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

</body>
<script>

// headline charts
let tempValues = {
    // labels: ["temperature"],
    series: [
        []
    ]
};
let pressValues = {
    // labels: ["pression"],
    series: [
        []
    ]
};
let lumValues = {
    // labels: ["lumiere"],
    series: [
        []
    ]
};
let iaqValues = {
    // labels: ["iaq"],
    series: [
        []
    ]
};

new Chartist.Line('#headline-chart', tempValues, optionsChart);
new Chartist.Line('#headline-chart-1', pressValues, optionsChart);
new Chartist.Line('#headline-chart-2', lumValues, optionsChart);
new Chartist.Line('#headline-chart-3', iaqValues, optionsChart);
var todo = false;
document.getElementById("stopOctave").disabled = true;

var companyName = "universit_gustave_eiffel";
var dID = "d6048d14e337dab5dbbb15059";

// Dashboard()
async function Dashboard(todo){
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
            $.getJSON("myKitData.json", function (json) {
                tempValues.series[0].splice(0,tempValues.series[0].length);
                pressValues.series[0].splice(0,pressValues.series[0].length);
                lumValues.series[0].splice(0,lumValues.series[0].length);
                iaqValues.series[0].splice(0,iaqValues.series[0].length);
            
                document.getElementById("temp").innerHTML = (json.map(e=>(tempValues.series[0].push(e.temperature),e.temperature)).reduce((a, b) => (parseInt(a) + parseInt(b))) / json.length).toFixed(2)+" °C"
                document.getElementById("pressur").innerHTML = (json.map(e=>(pressValues.series[0].push(e.pression),e.pression)).reduce((a, b) => (parseInt(a) + parseInt(b))) / json.length).toFixed(2)+" mb"
                document.getElementById("light").innerHTML = (json.map(e=>(lumValues.series[0].push(e.lumiere),e.lumiere)).reduce((a, b) => (parseInt(a) + parseInt(b))) / json.length).toFixed(2)+" %"
                document.getElementById("iaq").innerHTML = (json.map(e=>(iaqValues.series[0].push(e.iaq),e.iaq)).reduce((a, b) => (parseInt(a) + parseInt(b))) / json.length).toFixed(2)
                
                // console.log(json.map(e=>(tempValues.series[0].push(e.temperature),e.temperature)))
                // console.log(json.map(e=>{tempValues.series[0].push(e.temperature);return e.temperature}))
                // summary = data.body.summary;

                //     let myHistory = {
                //         "date": new Date(),
                //         "temperature": JSON.parse(summary["/environment/value"].v).temperature.toFixed(2),
                //         "pression": convertPascal(JSON.parse(summary["/environment/value"].v).pressure).toFixed(0),
                //         "lumiere": (summary["/light/value"].v * 100).toFixed(2),
                //         "iaq":JSON.parse(summary["/environment/value"].v).iaqValue.toFixed(2)
                //     };

                //     exportData(myHistory)
                //     $("#trans").click();
                // },
                // error: function(request, textStatus, errorThrown) {
                //     alert(request.getResponseHeader('some_header'));
                //     console.log("error");
                // }
            })
        }
    })
    let delayRes = await delayDataDashboard(5000);
}		

function delayDataDashboard(delayInms) {
    return new Promise(resolve => {
        setTimeout(() => {
            if (todo){
                Dashboard(todo);
                new Chartist.Line('#headline-chart', tempValues, optionsChart);
                new Chartist.Line('#headline-chart-1', pressValues, optionsChart);
                new Chartist.Line('#headline-chart-2', lumValues, optionsChart);
                new Chartist.Line('#headline-chart-3', iaqValues, optionsChart);
                //console.log(tempValues.series[0]);
            }
            // console.log(tempValues.series[0]);
        }, delayInms);
    });
}

function exportData(x){
    //console.log(x);
    let content=JSON.stringify(x);
    document.getElementById("temp").value = content;
    submitData();
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

// function average(nums) {
//     return nums.reduce((a, b) => (a + b)) / nums.length;
// }

var optionsChart = {
    height: 300,
    showLine: true,
    showPoint: false,
    fullWidth: true,
    axisX: {
        showGrid: false
    },
    axisY: {
        showGrid: true
    },
    lineSmooth: true,
    showArea: true,
    chartPadding: {
        left: 20,
        right: 20
    },
};

var optionsBarChart = {
    height: 300,
}

function inverseTodo() {
    document.getElementById("buttonOctave").disabled = false;
    document.getElementById("stopOctave").disabled = true;
    return todo = !todo;
}

// function delay(delayInms) {
//     return new Promise(resolve => {
//         setTimeout(() => {
//             if (todo) {
//                 octaveCall(todo);
//                 new Chartist.Line('#headline-chart', tempValues, optionsTempChart);
//             }
//         }, delayInms);
//     });
// }

// async function octaveCall(todo) {
//     document.getElementById("buttonOctave").disabled = true;
//     var companyName = "universit_gustave_eiffel";
//     var dID = "d6048d14e337dab5dbbb15059";
//     var getValues = {};

//     $.ajax({
//         url: "https://octave-api.sierrawireless.io/v5.0/" + companyName + "/device/" + dID,
//         headers: {
//             'X-Auth-User': 'yacine_hadjar',
//             'X-Auth-Token': 'shAixQsXspB5bJ6LpKBCD6myetVX86po',
//         },
//         type: "GET",
//         cache: false,
//         success: function(data, textStatus, request) {

//             getValues = data.body;
//             getSummary = getValues.summary;

//             document.getElementById("temperatureC").innerHTML = JSON.parse(getSummary[
//                 "/environment/value"].v).temperature.toFixed(2) + " C°";
//             document.getElementById("pression").innerHTML = convertPascal(JSON.parse(getSummary[
//                 "/environment/value"].v).pressure).toFixed(0) + " mb";
//             document.getElementById("humidite").innerHTML = JSON.parse(getSummary[
//                 "/environment/value"].v).humidity.toFixed(2) + " %";
//             document.getElementById("co2").innerHTML = JSON.parse(getSummary["/environment/value"]
//                 .v).co2EquivalentValue.toFixed(2) + " ";
//             document.getElementById("airqualite").innerHTML = JSON.parse(getSummary[
//                 "/environment/value"].v).iaqValue.toFixed(2);
//             document.getElementById("light").innerHTML = (getSummary["/light/value"].v * 100)
//                 .toFixed(2) + " %";

//             try {
//                 if (tempValues.series[0].length < 17) {
//                     tempValues.series[0].push(JSON.parse(getSummary["/environment/value"].v)
//                         .temperature.toFixed(2));
//                     tempValues.labels.push(new Date(getSummary["/environment/value"].ts)
//                         .toLocaleTimeString());
//                 } else {
//                     tempValues.series[0].splice(0, 1);
//                     tempValues.labels.splice(0, 1);
//                     tempValues.series[0].push(JSON.parse(getSummary["/environment/value"].v)
//                         .temperature.toFixed(2));
//                     tempValues.labels.push(new Date(getSummary["/environment/value"].ts)
//                         .toLocaleTimeString());
//                 }
//                 console.log(tempValues);
//             } catch (error) {
//                 //console.log(error);
//             }
//         },
//         error: function(request, textStatus, errorThrown) {
//             alert(request.getResponseHeader('some_header'));
//             console.log("error");
//         }
//     })
//     let delayRes = await delay(1000);
// }
</script>

</html>