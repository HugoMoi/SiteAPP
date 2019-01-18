<?php include("General.php");

$bdd = new PDO("mysql:host=localhost;dbname=espace_membre",'root','');
if(isset($_SESSION['id']) AND $_SESSION['id']>0)
{
	$getid = intval($_SESSION['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
		<link rel="stylesheet" href="design/profil.css" />
	</head>
	<body>
		<div id="content">
			<div id="infos">
				<div id="profil"> 
					<div id="top">Profil</div>
					<table>
						<tr>
							<td>Prénom</td>
							<td><?php echo $userinfo ['prenom']; ?></td>
						</tr>
						<tr>
							<td>Nom</td>
							<td><?php echo $userinfo ['nom']; ?></td>
						</tr>
						<tr>
							<td>Pseudo</td>
							<td><?php echo $userinfo ['pseudo']; ?></td>
						</tr>
						<tr>
							<td>Mail</td>
							<td><?php echo $userinfo ['mail']; ?></td>
						</tr>
					</table>
				</div>
				<div id="adresse">
					<div id="top">Adresse de facturation</div>
					<table>
						<tr>
							<td>Adresse</td>
							<td><?php echo $userinfo ['adresse']; ?></td>
						</tr>
						<tr>
							<td>Code Postal</td>
							<td><?php echo $userinfo ['codepostal']; ?></td>
						</tr>
						<tr>
							<td>Ville</td>
							<td><?php echo $userinfo ['ville']; ?></td>
						</tr>
					</table>
				</div>
				<div id="btn">
				<?php
				if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
				{
					?>
					<a class="lien" href="index.php?action=editionprofil"> Editer mon profil </a>
					<a class="lien" href="index.php?action=deconnexion"> Se déconnecter </a>
					<?php
				}
				?>
				</div>
			</div>

			<div id="live_house"></div>
			<div id="lien">

			</div>
		</div>

<script>

$(document).ready(function(){  
    function fetch_house() {  
    	var idm = "<?= $getid ?>";
      $.ajax({  
        url:"index.php?action=house_fetch",  
        method:"POST",
        data:{idm:idm},  
        dataType:"text", 
        success:function(data){  
          $('#live_house').html(data);  
        }  
      });  
    }  
    fetch_house();  
    $(document).on('click', '#btn_add_house', function(){  
      var house_name = $('#house_name').text();
      var house_address = $('#house_address').text(); 
      var house_postal = $('#house_postal').text();   
      var house_town = $('#house_town').text(); 
        if(house_name == '' || house_address == '' || house_postal == '' || house_town == '') {    
          return false;  
        }
      var idm = "<?= $getid ?>";
      $.ajax({  
        url:"index.php?action=house_add",  
        method:"POST",  
        data:{idm:idm,house_name:house_name,house_address:house_address,house_postal:house_postal,house_town:house_town},  
        dataType:"text",  
        success:function(data) {   
          fetch_house();  
        }  
      })  
    });  
    function edit_house(id, text, column_name) {  
      $.ajax({  
        url:"index.php?action=house_edit",  
        method:"POST",  
        data:{id:id, text:text, column_name:column_name},  
        dataType:"text",  
        success:function(data){
        }  
      });  
      }  
    $(document).on('blur', '.house_name', function(){  
      var id = $(this).data("id1");  
      var house_name = $(this).text();  
      edit_house(id, house_name, "HouseName");  
    }); 
    $(document).on('blur', '.house_address', function(){  
      var id = $(this).data("id2");  
      var house_address = $(this).text();  
      edit_house(id, house_address, "HouseAddress");  
    }); 
    $(document).on('blur', '.house_postal', function(){  
      var id = $(this).data("id3");  
      var house_postal = $(this).text();  
      edit_house(id, house_name, "HousePostal");  
    }); 
    $(document).on('blur', '.house_town', function(){  
      var id = $(this).data("id4");  
      var house_town = $(this).text();  
      edit_house(id, house_town, "HouseTown");  
    });  
    $(document).on('click', '.btn_delete_house', function(){  
      var id=$(this).data("id5");  
      $.ajax({  
        url:"index.php?action=house_remove",  
        method:"POST",  
        data:{id:id},  
        dataType:"text",  
        success:function(data){ 
          fetch_house();  
        }  
      });  
    });  
});

</script>
	
</body>
</html>
<?php
}
else{
	header("Location:index.php?action=inscription");
}
?>
