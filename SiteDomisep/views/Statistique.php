<?php
include("General.php");
?>
<html>
<head>
    <link rel="stylesheet" href="design/Statistique.css" />
    <meta charset="utf-8"/>
    <title>Statistique</title>

</head>
<body>
    <?php if(!empty($_SESSION['id'])){ ?>

    <div class="box">
   
    <ul id="statistique">
        <li><a href="views/diagramme_temperature.php" target="content1">témperature</a></li>
        <li><a href="views/diagramme_humite.php" target="content1">humidité</a></li>
    </ul>
    <iframe src="views/diagramme_temperature.php" name="content1" ></iframe>
</div>
<script>
    var lis=document.querySelectorAll("#example1 li");
    var len=lis.length;
    for(var i=0;i<len;i++){
        lis[i].onclick=function(){
            
            for(var i=0;i<len;i++){
                if(lis[i]==this){
                    lis[i].style.background="#f90";
                    lis[i].querySelector("a").style.color="white";
                }else{
                    lis[i].style.background="white";
                    lis[i].querySelector("a").style.color="black";
                }
            }
        }
    }
</script>
<?php 
}
else{
    header('Location:index.php?action=connexion');
}
?>
</body>
</html>