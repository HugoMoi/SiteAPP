<!DOCTYPE html>
<html>
	<head>
		<title>Vertical</title>
		<link rel="stylesheet" href="design/vertical.css">
		<meta charset="utf-8">
	</head>
	<body>
        <div class="range-slider">
        	<div class="thermometer"></div>
            <input class="vertical" id="tempValue" type="range" step="0.5" value="0" min="0" max="40">
            <div class="bulb"></div>
            <p class="print"><span id="print"></span>°C</p>
        </div> 
    </body>
<script>
var slider = document.getElementById("tempValue");
var output = document.getElementById("print");
output.innerHTML = slider.value;

slider.oninput = function() {
	output.innerHTML = this.value; 
}  

function thermos(value) {  
    $.ajax({  
        url:"index.php?action=thermometer",  
        method:"POST",  
        data:{value:value},  
        dataType:"text",  
        success:function(data){}  
    });  
}  
$(document).on('click', 'vertical', function(){  
  var value = $(this).value; 
  thermos(value);  
});

</script>
</html>
