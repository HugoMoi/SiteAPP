<!DOCTYPE html>
<html>
	<head>
		<title>Nouvelle pièce</title>
		<link rel="stylesheet" href="design/general.css">
		<link rel="stylesheet" href="design/addRoom.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php include("views/general.php"); ?>

		<div id="content">
			<form method="post" action="index.php?action=addRoom">
        		<p>
            		<label> Nom de la pièce :
                		<input type="text" name="roomName" required>
            		</label>        
        		<p>
           			<label> Gestion de la température ?
               			<input type="checkbox" name="roomTemp"> 
            		</label>
        		</p>
        		<p>
        			<label> Nombres de lampes :
        				<input type="text" id="nbLamp" oninput="addLamps()" name="nbLamp" value=""><br/>
    					<div id="newLamps">
    					</div>
    				</label>
    			</p>
    			<p>
    				<label> Nombres de fenêtres :
        				<input type="text" id="nbWindow" oninput="addWindows()" name="nbWindow" value=""><br/>
    					<div id="newWindows">
    					</div>
    				</label>
    			</p>
    			<p>
    				<label> Nombres de capteurs :
        				<input type="text" id="nbCaptor" oninput="addCaptors()" name="nbCaptor" value=""><br/>
    					<div id="newCaptors">
    					</div>
    				</label>
    			</p>
                <p>
        		  <label>
        		      <input type="submit" value="Ajouter">
        		  </label>
                </p>
    		</form>
		</div>
	</body>
<script>
function addLamps(){
            var number = document.getElementById("nbLamp").value;
            var newLamps = document.getElementById("newLamps");
            while (newLamps.hasChildNodes()) {
                newLamps.removeChild(newLamps.lastChild);
            }
            for (i=0;i<number;i++){
                /*newLamps.appendChild(document.createTextNode("Nom de la lampe " + (i+1)));*/

                var input = document.createElement("input");
                input.type = "text";
                input.name = "nbLamp" + i;
                input.placeholder = "Nom de la lampe " + (i+1);
                newLamps.appendChild(input);
                newLamps.appendChild(document.createElement("br"));
            }
        }
function addWindows(){
            var number = document.getElementById("nbWindow").value;
            var newWindows = document.getElementById("newWindows");
            while (newWindows.hasChildNodes()) {
                newWindows.removeChild(newWindows.lastChild);
            }
            for (i=0;i<number;i++){
                /*newWindows.appendChild(document.createTextNode("Nom de la lampe " + (i+1)));*/

                var input = document.createElement("input");
                input.type = "text";
                input.name = "nbWindow" + i;
                input.placeholder = "Nom de la fenêtre " + (i+1);
                newWindows.appendChild(input);
                newWindows.appendChild(document.createElement("br"));
            }
        }

function addCaptors(){
            var number = document.getElementById("nbCaptor").value;
            var newCaptors = document.getElementById("newCaptors");
            while (newCaptors.hasChildNodes()) {
                newCaptors.removeChild(newCaptors.lastChild);
            }
            for (i=0;i<number;i++){
                /*newCaptors.appendChild(document.createTextNode("Nom de la lampe " + (i+1)));*/

                var input = document.createElement("input");
                input.type = "text";
                input.name = "nbCaptor" + i;
                input.placeholder = "Nom du capteur " + (i+1);
                newCaptors.appendChild(input);
                newCaptors.appendChild(document.createElement("br"));
            }
        }


</script>
</html>