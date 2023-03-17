<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      a{  text-decoration:none;}

    </style>
  </head>
  <body>
  <?php   include_once "../config.php";
  session_start();$con=config::connect();
  include "hellper\users.php";
  if(isset($_SESSION['rec_id'])){
    $rec_id=$_SESSION['rec_id'];
    $rows=getallcandidature($con) ;
   echo '<input type="text" value="1" id="choix" hidden>' ;
   $choix=1;
   include "../sidebarrec.php";

  }
  else if(isset($_SESSION['user_id'])){
    $can_id=$_SESSION['user_id'];
    $rows=getallrecruter($con) ;
    echo '<input type="text" value="0" id="choix" hidden>' ;
    $choix=0;
    include "../sidebar.php";
  }
  else{
    header("location:index.php");
    exit;
  }
 

  
  ?>
    <section>    <?php include "../header.php";?>
    <div class="row shadow p-4 rounded mx-3">
 
    <div class="col-lg-2"  id="usersshow">
   
    <p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    USERS
  </a>
  
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   

<ul class="list-group" style="height: 400px; overflow-y:auto">
    <?php
 

// print_r($rows) ;
foreach($rows as $row)
{
    ?>
    

    <a href="chat.php?id=<?=$row['id']?>&username=<?=$row['username']?>">
  <li class="list-group-item" id="<?=$row['id']?>"><?=$row['username']?></li></a>
   <?php
}
?></ul>   </div>
</div>
</div>

<div class="col-lg-8" id="messageshow">
<div
            class="card-header d-flex justify-content-between align-items-center p-3 text-white border-bottom-0"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px; background-color:#338573">
            <i class="fas fa-angle-left"></i>
            <p class="mb-0 fw-bold"><?=isset($_GET["username"])?$_GET["username"]:"welcome to the chat"?></p>
            <i class="fas fa-times"></i>
          </div>
    <div class="w-400 ">


    	   <div class="d-flex align-items-center">

    	   </div>

    	   <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box"
    	        id="chatBox"  style="height: 400px; overflow-y:auto">

<?php
if(isset($_GET["id"])){
 if(isset($can_id)){
  $rec_id=$_GET['id']; 
 }else{
  $can_id=$_GET['id'];
 }
    $stmt=$con->prepare( "SELECT * FROM messages where rec_id=$rec_id AND
    can_id=$can_id ");

$stmt->execute();
$chats=$stmt->fetchAll(pdo::FETCH_ASSOC);
foreach($chats as $chat)
{
if($chat["receive"]== $choix ){
echo '<div style="text-align:right;">
<p style="background-color: lightblue; word-wrap: break-word; display:inline-block;
padding:5px; border-radius:10px; max-width:50%;">
'.$chat["message"].'
</p>
</div>';}
else{
echo '<div style="text-align:leftt;">
<p style="background-color: yellow; word-wrap: break-word; display:inline-block;
padding:5px; border-radius:10px; max-width:70%;">
'.$chat["message"].'
</p>
</div>';
}
} ?></div>
    </div>
<form action="">
<div class="input-group mb-3">
  <input type="text" value="<?=$chat['id']?>" id="lastmessage" hidden>
  <input type="text" value="<?=$can_id?>" id="can_id" hidden>
  <input type="text" value="<?=$rec_id?>" id="rec_id" hidden>
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" id="message" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="button" id="sendBtn">Button</button>
</div>
</form>
<?php
}else{
  ?>
  </div>
    </div>
<div class="input-group mb-3">

  <input type="text" class="form-control readonly" placeholder="Recipient's username" aria-label="Recipient's username" id="message" aria-describedby="button-addon2" disabled>
  <button class="btn btn-outline-secondary" type="button" disabled >Button</button>
</div>
<?php
}
?>
  </div>
</div></div>
</section>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="ajax\ajax.js"></script>
 <script>
  $('#collapseExample').on('show.bs.collapse', function () {
  $('#usersshow').addClass('col-lg-4');
   $('#messageshow').removeClass('col-lg-8');
  $('#messageshow').addClass('col-lg-6');

});

$('#collapseExample').on('hide.bs.collapse', function () {
  $('#usersshow').removeClass('col-lg-4');
  $('#messageshow').removeClass('col-lg-6');
  $('#messageshow').addClass('col-lg-8');


});
 </script>
  </body>
</html>