
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>diagramme humidité</title>
</head>
<body>

<script src="https://code.highcharts.com/highcharts.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php
    session_start();
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "espace_membre";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result=$conn->query('SELECT date,humite FROM dbStatistique WHERE id_client="'.$_SESSION['id'].'"');
    $compteur=0;
    while($row=$result->fetch()){
        $compteur++;
        $day[]=$row['date'];
        $pourcent[]=$row['humite'];
    }
    if($compteur!=0){
    $day=json_encode($day);
    //print($day);
    $pourcent=json_encode($pourcent,JSON_NUMERIC_CHECK);
    //print($number);
    $conn = null;
}
?>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'humidité'
    },
    xAxis: {
        categories: <?php echo $day;?>,
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
        name: 'humidité',
        data: <?php echo $pourcent; ?>,
    }]
});
</script>
</body>
</html>
