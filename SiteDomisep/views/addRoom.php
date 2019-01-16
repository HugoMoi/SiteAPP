<html>
	<head>
		<title>Maison</title>
		<link rel="stylesheet" href="design/addRoom.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>

		<div id="content">
			<form method="post" action="index.php?action=addRoom">
        		<div id="room">
                    <div id="top"> Nouvelle pièce </div>
                	<div id="bot">
                        <p>Nom de la pièce :</p>
                	   <input type="text" name="roomName" placeholder="Nom de la nouvelle pièce" required>
           		       <p>Chauffage ?
               		       <label class="switch">
                                <input type="checkbox" name="roomTemp">
                                <span class="slider"></span>
                            </label>
                        </p> 
                    </div>
                    <div id="cercle">
                        <input type="submit" id="submit" value="Ajouter">
                    </div>
        		</div>
        		<div id="lamp">
                    <div id="top"> 
                        Nombres de lampes :
    				    <input type="text" id="nbLamp" oninput="addLamps()" name="nbLamp" value="">
                    </div>
					<div id="newLamps"></div>
    			</div>
    			<div id="window">
    				<div id="top"> Nombres de fenêtres :
        				<input type="text" id="nbWindow" oninput="addWindows()" name="nbWindow" value="">
    				</div>
                    <div id="newWindows"></div>
    			</div>
    			<div id="captor">
    				<div id="top"> Nombres de capteurs :
        				<input type="text" id="nbCaptor" oninput="addCaptors()" name="nbCaptor" value="">
    				</div>
                    <div id="newCaptors"></div>
    			</div>
    		</form>
		</div>
	</body>
</html>
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
