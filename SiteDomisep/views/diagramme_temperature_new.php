<html>
<head>
    <meta charset="utf-8"/>
    <title>diagramme temperature</title>

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
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=YEAR(CURDATE()) AND MONTH(DATE)=MONTH(CURDATE()) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $dateNow[]=$row['date'];
        $temperatureNow[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(1) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date1[]=$row['date'];
        $temperature1[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(2) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date2[]=$row['date'];
        $temperature2[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(3) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date3[]=$row['date'];
        $temperature3[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(4) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date4[]=$row['date'];
        $temperature4[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(5) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date5[]=$row['date'];
        $temperature5[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(6) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date6[]=$row['date'];
        $temperature6[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(7) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date7[]=$row['date'];
        $temperature7[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(8) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date8[]=$row['date'];
        $temperature8[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(9) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date9[]=$row['date'];
        $temperature9[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(10) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date10[]=$row['date'];
        $temperature10[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(11) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date11[]=$row['date'];
        $temperature11[]=$row['temperature'];
    }
    
    $result=$conn->query('SELECT date,temperature FROM dbStatistique WHERE YEAR(date)=(2019) AND MONTH(DATE)=MONTH(12) AND id_client="'.$_SESSION['id'].'"');
    while($row=$result->fetch()){
        $date12[]=$row['date'];
        $temperature12[]=$row['temperature'];
    }
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
    
    $temperatureNow=json_encode($temperatureNow,JSON_NUMERIC_CHECK);
    $temperature1=json_encode($temperature1,JSON_NUMERIC_CHECK);
    $temperature2=json_encode($temperature2,JSON_NUMERIC_CHECK);
    $temperature3=json_encode($temperature3,JSON_NUMERIC_CHECK);
    $temperature4=json_encode($temperature4,JSON_NUMERIC_CHECK);
    $temperature5=json_encode($temperature5,JSON_NUMERIC_CHECK);
    $temperature6=json_encode($temperature6,JSON_NUMERIC_CHECK);
    $temperature7=json_encode($temperature7,JSON_NUMERIC_CHECK);
    $temperature8=json_encode($temperature8,JSON_NUMERIC_CHECK);
    $temperature9=json_encode($temperature9,JSON_NUMERIC_CHECK);
    $temperature10=json_encode($temperature10,JSON_NUMERIC_CHECK);
    $temperature11=json_encode($temperature11,JSON_NUMERIC_CHECK);
    $temperature12=json_encode($temperature12,JSON_NUMERIC_CHECK);
    $conn = null;

?>

<div style="text-align:center;">
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
</div>
<script>
var chart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'température'
    },
    xAxis: {
        categories: <?php echo $dayNow;?>,
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
        data: <?php echo $temperatureNow; ?>,
    }]
});

$('#b1').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date1; ?>,
    },
        series: [{
            data: <?php echo $temperature1; ?>
        }]
    });
});

$('#b2').click(function () {

    chart.update({
        xAxis: {
        categories: <?php echo $date2; ?>,
    },
        series: [{
            data: <?php echo $temperature2; ?>
        }]
    });
});

$('#b3').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date3; ?>,
    },
        series: [{
            data: <?php echo $temperature3; ?>
        }]
    });
});

$('#b4').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date4; ?>,
    },
        series: [{
            data: <?php echo $temperature4; ?>
        }]
    });
});

$('#b5').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date5; ?>,
    },
        series: [{
            data: <?php echo $temperature5; ?>
        }]
    });
});

$('#b6').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date6; ?>,
    },
        series: [{
            data: <?php echo $temperature6; ?>
        }]
    });
});

$('#b7').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date7; ?>,
    },
        series: [{
            data: <?php echo $temperature7; ?>
        }]
    });
});

$('#b8').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date8; ?>,
    },
        series: [{
            data: <?php echo $temperature8; ?>
        }]
    });
});

$('#b9').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date9; ?>,
    },
        series: [{
            data: <?php echo $temperature9; ?>
        }]
    });
});

$('#b10').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date10; ?>,
    },
        series: [{
            data: <?php echo $temperature10; ?>
        }]
    });
});

$('#b11').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $date11; ?>,
    },
        series: [{
            data: <?php echo $temperature11; ?>
        }]
    });
});

$('#b12').click(function () {
    chart.update({
        xAxis: {
        categories: <?php echo $temperature12; ?>,
    },
        series: [{
            data: <?php echo $humite12; ?>
        }]
    });
});
</script>
</body>
</html>
