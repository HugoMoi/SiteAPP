<?php 

include "models/model.php";


function maison() {
  include "views/maison.php";
}

function vertical() {
    include "views/vertical.php";
}

function general() {
    include "views/general.php";
}

function actionLamp() {
	if(isset($_GET['idl']) AND !empty($_GET['idl'])) {
    	$getidl = (int) $_GET['idl'];
    	$checkl = checkl($getidl);
    	if($checkl->rowCount() == 1) {
        	offl($getidl);
    	} else {
        	onl($getidl);
    	} 
    include "views/maison.php";
 	} 
}

function actionWindow() {
	if(isset($_GET['idw']) AND !empty($_GET['idw'])) {
    	$getidw = (int) $_GET['idw'];
    	$checkw = checkw($getidw);
    	if($checkw->rowCount() == 1) {
        	offw($getidw);
    	} else {
        	onw($getidw);
    	} 
    include "views/maison.php";
 	} 
}


function addRoom() {
    if (isset($_POST['roomName'])) {
        $roomTemp = 0;
        roomTemp($roomTemp);
        insertRoom($roomTemp);
        header('Location: index.php?action=maison');
    }
    include "views/addRoom.php";
}

function editRoom() {
  $idr = (int) $_GET['idr'];
  include "views/editRoom.php";
}

function roomTemp($roomTemp) {
    if (empty($_POST['roomTemp'])) {
        $RoomTempState = 0;
    }
    return $roomTemp;
}

function room_add() {
  room_insert();
}

function room_remove() {
  room_delete();
}

function room_fetch() {
  $output = '';
  $row = 0;
  $result = room_select();
  $output .= '  
    <div>  
      <table> 
        <th>Nom de la pièce</th>   
        <th></th> '; 
  while($row = mysqli_fetch_array($result)) {  
    if(mysqli_num_rows($result) > 0) {    
      $output .= '
        <tr>
          <td class="room_name" data-id1="'.$row["RoomID"].'" contenteditable>'.$row["RoomName"].'</td>   
          <td><a href="index.php?=home"><button type="button" name="btn_delete_room" data-id2="'.$row["RoomID"].'" class="btn_delete_room">x</button></a></td>  
        </tr>';   
    }
    else {  
      $output .= '
            <tr>  
              <td class="noName" id="room_name" contenteditable>Pas de nom</td>    
              <td><button type="button" name="btn_add_room" id="btn_add_room">+</button></td>  
            </tr>';
    }
    $roomTempText = "";
    if ($row["RoomTempState"] == 1) {
      $roomTempText = "checked";
    }
    $output .= '        
          <tr>      
            <td>Température ?</td>   
            <td><input type="checkbox" data-id3="'.$row["RoomID"].'" '.$roomTempText.' class="btn_temp"></td>  
          </tr>
        </table>  
      </div>';
    
  }
  echo $output;  
}

function room_edit() {
  $id = (int) $_POST["id"];  
  $text = $_POST["text"];    
  room_update($id,$text);
}

function room_temp() { 
  $id = (int) $_POST["id"];  
  $text = $_POST["text"];    
  temp_edit($id,$text);
}

function lamp_add() {
  lamp_insert();
}

function lamp_remove() {
  lamp_delete();
}

function lamp_fetch() {
  $output = '';
  $result = lamp_select();
  $output .= '  
      <div>  
           <table>  
                <tr>  
                     <th>Lampes</th>   
                     <th>Modifier</th>  
                </tr>';  
  if(mysqli_num_rows($result) > 0)  
  {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                     <td class="lamp_name" data-id1="'.$row["LampID"].'" contenteditable>'.$row["LampName"].'</td>   
                     <td><button type="button" name="btn_delete_lamp" data-id2="'.$row["LampID"].'" class="btn_delete_lamp">x</button></td>  
                </tr>  
           ';  
      }  
  }  
 else  
  {  
      $output .= '<tr>  
                          <td>No Lamp</td>  
                     </tr>';  
  }  
  $output .='  
           <tr>  
                <td id="lamp_name" contenteditable></td>    
                <td><button type="button" name="btn_add_lamp" id="btn_add_lamp">+</button></td>  
           </tr>
           </table>  
      </div>';  
  echo $output;  
}

function lamp_edit() {
  $id = (int) $_POST["id"];  
  $text = $_POST["text"];    
  lamp_update($id,$text);
}  

function window_add() {
  window_insert();
}

function window_remove() {
  window_delete();
}

function window_fetch() {
  $output = '';
  $result = window_select();
  $output .= '  
      <div>  
           <table>  
                <tr>  
                     <th>Fenêtres</th>   
                     <th>Modifier</th>  
                </tr>';  
  if(mysqli_num_rows($result) > 0)  
  {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                     <td class="window_name" data-id1="'.$row["WindowID"].'" contenteditable>'.$row["WindowName"].'</td>   
                     <td><button type="button" name="btn_delete_window" data-id2="'.$row["WindowID"].'" class="btn_delete_window">x</button></td>  
                </tr>  
           ';  
      }  
  }  
 else  
  {  
      $output .= '<tr>  
                          <td>No Window</td>  
                     </tr>';  
  }  
  $output .='  
           <tr>  
                <td id="window_name" contenteditable></td>    
                <td><button type="button" name="btn_add_window" id="btn_add_window">+</button></td>  
           </tr>
           </table>  
      </div>';  
  echo $output;  
}

function window_edit() {
  $id = (int) $_POST["id"];  
  $text = $_POST["text"];    
  window_update($id,$text);
}

function captor_add() {
  captor_insert();
}

function captor_remove() {
  captor_delete();
}

function captor_fetch() {
  $output = '';
  $result = captor_select();
  $output .= '  
      <div>  
           <table>  
                <tr>  
                     <th>Capteurs</th>   
                     <th>Modifier</th>  
                </tr>';  
  if(mysqli_num_rows($result) > 0)  
  {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                     <td class="captor_name" data-id1="'.$row["CaptorID"].'" contenteditable>'.$row["CaptorName"].'</td>   
                     <td><button type="button" name="btn_delete_captor" data-id2="'.$row["CaptorID"].'" class="btn_delete_captor">x</button></td>  
                </tr>  
           ';  
      }  
  }  
 else  
  {  
      $output .= '<tr>  
                          <td>No Captor</td>  
                     </tr>';  
  }  
  $output .='  
           <tr>  
                <td id="captor_name" contenteditable></td>    
                <td><button type="button" name="btn_add_captor" id="btn_add_captor">+</button></td>  
           </tr>
           </table>  
      </div>';  
  echo $output;  
}

function captor_edit() {
  $id = $_POST["id"];  
  $text = $_POST["text"];    
  captor_update($id,$text);
}

function thermometer() {
  $temp = $_POST["temp"];  
  temp_update($temp);
}
?>