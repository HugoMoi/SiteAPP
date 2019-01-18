<html>  
  <head>  
    <title></title>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel="stylesheet" href="design/editRoom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"> 
  </head>  
  <body>
    <?php include("views/general.php"); 
    ?>
    <div id="live">
      <div id="live_room" class="live room"></div> 
      <div id="live_lamp" class="live lamp" ></div>
      <div id="live_window" class="live window"></div> 
      <div id="live_captor" class="live captor"></div> 
    </div>
  </body>  
</html>   
 <script> 
  $(document).ready(function(){  
    function fetch_room() {  
      $.ajax({  
        url:"index.php?action=room_fetch&idr='<?= $idr ?>'&idh=<?= $idh ?>",  
        method:"POST",  
        success:function(data){  
          $('#live_room').html(data);  
        }  
      });  
    }  
    fetch_room();
    $(document).on('click', '#btn_add_room', function(){  
      var room_name = $('#room_name').text();  
        if(room_name == '') {    
          return false;  
        }  
      $.ajax({  
        url:"index.php?action=room_add&idr='<?= $idr ?>'",  
        method:"POST",  
        data:{room_name:room_name},  
        dataType:"text",  
        success:function(data) {   
          fetch_room();  
        }  
      });  
    });  
    function edit_room(id, text) {  
      $.ajax({  
        url:"index.php?action=room_edit",  
        method:"POST",  
        data:{id:id, text:text},  
        dataType:"text",  
        success:function(data){}  
      });  
    }  
    $(document).on('blur', '.room_name', function(){  
      var id = $(this).data("id1");  
      var room_name = $(this).text();  
      edit_room(id, room_name);  
    });
    $(document).on('click', '.btn_delete_room', function(){  
      var id=$(this).data("id2");  
      $.ajax({  
        url:"index.php?action=room_remove&idh='<?= $idh ?>'",  
        method:"POST",  
        data:{id:id},  
        dataType:"text",  
        success:function(data){ 
          fetch_room();  
        }  
      });  
    });
    function edit_temp(id, text) {  
      $.ajax({  
        url:"index.php?action=room_temp",  
        method:"POST",  
        data:{id:id, text:text},  
        dataType:"text",  
        success:function(data){}  
      });  
    }  
    $(document).on('click', '.btn_temp', function(){  
      var id = $(this).data("id3");  
      var text = $("input:checkbox").is(":checked") ? 1:0; 
      edit_temp(id, text);  
    });        
  });         
  $(document).ready(function(){  
    function fetch_lamp() {  
      $.ajax({  
        url:"index.php?action=lamp_fetch&idr='<?= $idr ?>'",  
        method:"POST",  
        success:function(data){  
          $('#live_lamp').html(data);  
        }  
      });  
    }  
    fetch_lamp();  
    $(document).on('click', '#btn_add_lamp', function(){  
      var lamp_name = $('#lamp_name').text();  
        if(lamp_name == '') {    
          return false;  
        }  
      $.ajax({  
        url:"index.php?action=lamp_add&idr='<?= $idr ?>'",  
        method:"POST",  
        data:{lamp_name:lamp_name},  
        dataType:"text",  
        success:function(data) {   
          fetch_lamp();  
        }  
      })  
    });  
    function edit_lamp(id, text) {  
      $.ajax({  
        url:"index.php?action=lamp_edit",  
        method:"POST",  
        data:{id:id, text:text},  
        dataType:"text",  
        success:function(data){}  
      });  
      }  
    $(document).on('blur', '.lamp_name', function(){  
      var id = $(this).data("id1");  
      var lamp_name = $(this).text();  
      edit_lamp(id, lamp_name);  
    });  
    $(document).on('click', '.btn_delete_lamp', function(){  
      var id=$(this).data("id2");  
      $.ajax({  
        url:"index.php?action=lamp_remove",  
        method:"POST",  
        data:{id:id},  
        dataType:"text",  
        success:function(data){ 
          fetch_lamp();  
        }  
      });  
    });  
  });
  $(document).ready(function(){  
    function fetch_window() {  
      $.ajax({  
        url:"index.php?action=window_fetch&idr='<?= $idr ?>'",  
        method:"POST",  
        success:function(data){  
          $('#live_window').html(data);  
        }  
      });  
    }  
    fetch_window();  
    $(document).on('click', '#btn_add_window', function(){  
      var window_name = $('#window_name').text();  
        if(window_name == '') {    
          return false;  
        }  
      $.ajax({  
        url:"index.php?action=window_add&idr='<?= $idr ?>'",  
        method:"POST",  
        data:{window_name:window_name},  
        dataType:"text",  
        success:function(data) {   
          fetch_window();  
        }  
      })  
    });  
    function edit_window(id, text) {  
      $.ajax({  
        url:"index.php?action=window_edit",  
        method:"POST",  
        data:{id:id, text:text},  
        dataType:"text",  
        success:function(data){}  
      });  
      }  
    $(document).on('blur', '.window_name', function(){  
      var id = $(this).data("id1");  
      var window_name = $(this).text();  
      edit_window(id, window_name);  
    });  
    $(document).on('click', '.btn_delete_window', function(){  
      var id=$(this).data("id2");  
      $.ajax({  
        url:"index.php?action=window_remove",  
        method:"POST",  
        data:{id:id},  
        dataType:"text",  
        success:function(data){ 
          fetch_window();  
        }  
      });  
    });  
  });  
  $(document).ready(function(){  
    function fetch_captor() {  
      $.ajax({  
        url:"index.php?action=captor_fetch&idr='<?= $idr ?>'",  
        method:"POST",  
        success:function(data){  
          $('#live_captor').html(data);  
        }  
      });  
    }  
    fetch_captor();  
    $(document).on('click', '#btn_add_captor', function(){  
      var captor_name = $('#captor_name').text();  
        if(captor_name == '') {    
          return false;  
        }  
      $.ajax({  
        url:"index.php?action=captor_add&idr='<?= $idr ?>'",  
        method:"POST",  
        data:{captor_name:captor_name},  
        dataType:"text",  
        success:function(data) {   
          fetch_captor();  
        }  
      })  
    });  
    function edit_captor(id, text) {  
      $.ajax({  
        url:"index.php?action=captor_edit",  
        method:"POST",  
        data:{id:id, text:text},  
        dataType:"text",  
        success:function(data){}  
      });  
    }  
    $(document).on('blur', '.captor_name', function(){  
      var id = $(this).data("id1");  
      var captor_name = $(this).text();  
      edit_captor(id, captor_name);  
    });  
    $(document).on('click', '.btn_delete_captor', function(){  
      var id=$(this).data("id2");  
      $.ajax({  
        url:"index.php?action=captor_remove",  
        method:"POST",  
        data:{id:id},  
        dataType:"text",  
        success:function(data){ 
          fetch_captor();  
        }  
      });  
    });  
  });  
 </script>