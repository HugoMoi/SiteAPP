<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>diagramme humidité</title>
</head>
<body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php
    session_start();
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "espace_membre";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=YEAR(CURDATE()) AND MONTH(DATE)=MONTH(CURDATE()) AND id_client="'.$_SESSION['id'].'"');
    
    while($row=$result->fetch()){
        $dayNow[]=$row['date'];
        $humiteNow[]=$row['humite'];
    }
    
    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=1 AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date1[]=$row['date'];
        $humite1[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=2 AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date2[]=$row['date'];
        $humite2[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=3 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date3[]=$row['date'];
        $humite3[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=4 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date4[]=$row['date'];
        $humite4[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=5 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date5[]=$row['date'];
        $humite5[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=6 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date6[]=$row['date'];
        $humite6[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=7 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date7[]=$row['date'];
        $humite7[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=8 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date8[]=$row['date'];
        $humite8[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=9 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date9[]=$row['date'];
        $humite9[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=10 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date10[]=$row['date'];
        $humite10[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=11 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date11[]=$row['date'];
        $humite11[]=$row['humite'];
    }

    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE YEAR(date)=2019 AND MONTH(DATE)=12 AND id_client="'.$_SESSION['id'].'"');

    while($row=$result->fetch()){
        $date12[]=$row['date'];
        $humite12[]=$row['humite'];
    }
 //Convertir les données temporelles au format JSON
    $dateNow=json_encode($dateNow);
    $date1=json_encode($date1);
    $date2=json_encode($date2);
    $date3=json_encode($date3);
    $date4=json_encode($date4);
    $date5=json_encode($date5);
    $date6=json_encode($date6);
    $date7=json_encode($date7);
    $date8=json_encode($date8);
    $date9=json_encode($date9);
    $date10=json_encode($date10);
    $date11=json_encode($date11);
    $date12=json_encode($date12);
    //Convertir les données d'humidité au format JSON
    $humiteNow=json_encode($humiteNow,JSON_NUMERIC_CHECK);
    $humite1=json_encode($humite1,JSON_NUMERIC_CHECK);
    $humite2=json_encode($humite2,JSON_NUMERIC_CHECK);
    $humite3=json_encode($humite3,JSON_NUMERIC_CHECK);
    $humite4=json_encode($humite4,JSON_NUMERIC_CHECK);
    $humite5=json_encode($humite5,JSON_NUMERIC_CHECK);
    $humite6=json_encode($humite6,JSON_NUMERIC_CHECK);
    $humite7=json_encode($humite7,JSON_NUMERIC_CHECK);
    $humite8=json_encode($humite8,JSON_NUMERIC_CHECK);
    $humite9=json_encode($humite9,JSON_NUMERIC_CHECK);
    $humite10=json_encode($humite10,JSON_NUMERIC_CHECK);
    $humite11=json_encode($humite11,JSON_NUMERIC_CHECK);
    $humite12=json_encode($humite12,JSON_NUMERIC_CHECK);
    $conn = null;
}
?>

<h2>click the button to change month</h2>
<button id = "b1" class = "autocompare">1</button>
<button id = "b2" class = "autocompare">2</button>
<button id = "b3" class = "autocompare">3</button>
<button id = "b4" class = "autocompare">4</button>
<button id = "b5" class = "autocompare">5</button>
<button id = "b6" class = "autocompare">6</button>
<button id = "b7" class = "autocompare">7</button>
<button id = "b8" class = "autocompare">8</button>
<button id = "b9" class = "autocompare">9</button>
<button id = "b10" class = "autocompare">10</button>
<button id = "b11" class = "autocompare">11</button>
<button id = "b12" class = "autocompare">12</button>

<script>
var chart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'humidité'
    },
    xAxis: {
        categories: <?php echo $dateNow;?>,
    },
    yAxis: {
        title: {
            text: '%'
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: '%'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        data: <?php echo $humiteNow; ?>,
    }]
});

$('#b1').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date1; ?>,
    },
        series: [{
            data: <?php echo $humite1; ?>
        }]
    });
});

$('#b2').click(function () {

    chart.update({
        xAxis: {
        categories: <?php echo $date2; ?>,
    },
        series: [{
            data: <?php echo $humite2; ?>
        }]
    });
});

$('#b3').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date3; ?>,
    },
        series: [{
            data: <?php echo $humite3; ?>
        }]
    });
});

$('#b4').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date4; ?>,
    },
        series: [{
            data: <?php echo $humite4; ?>
        }]
    });
});

$('#b5').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date5; ?>,
    },
        series: [{
            data: <?php echo $humite5; ?>
        }]
    });
});

$('#b6').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date6; ?>,
    },
        series: [{
            data: <?php echo $humite6; ?>
        }]
    });
});

$('#b7').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date7; ?>,
    },
        series: [{
            data: <?php echo $humite7; ?>
        }]
    });
});

$('#b8').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date8; ?>,
    },
        series: [{
            data: <?php echo $humite8; ?>
        }]
    });
});

$('#b9').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date9; ?>,
    },
        series: [{
            data: <?php echo $humite9; ?>
        }]
    });
});

$('#b10').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date10; ?>,
    },
        series: [{
            data: <?php echo $humite10; ?>
        }]
    });
});

$('#b11').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date11; ?>,
    },
        series: [{
            data: <?php echo $humite11; ?>
        }]
    });
});

$('#b12').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date12; ?>,
    },
        series: [{
            data: <?php echo $humite12; ?>
        }]
    });
});
</script>
</body>
</html>
