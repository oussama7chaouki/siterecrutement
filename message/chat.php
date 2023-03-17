<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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

  }
  else if(isset($_SESSION['user_id'])){
    $can_id=$_SESSION['user_id'];
    $rows=getallrecruter($con) ;
    echo '<input type="text" value="0" id="choix" hidden>' ;
    $choix=0;

  }
  else{
    header("location:index.php");
    exit;
  }
 
  include "../sidebar.php";
  
  ?>
    <section>    <?php include "../header.php";?>
    <div class="row shadow p-4 rounded mx-3">
 
    <div class="col-sm-4">
   

<ul class="list-group" style="height: 400px; overflow-y:auto">
    <?php
 

// print_r($rows) ;
foreach($rows as $row)
{
    ?>
    

    <a href="chat.php?id=<?=$row['id']?>">
  <li class="list-group-item" id="<?=$row['id']?>"><?=$row['username']?></li></a>
   <?php
}
?></ul> 
</div>

<div class="col-sm-6">
    <div class="w-400 shadow p-4 rounded">
    	<a href="home.php"
    	   class="fs-4 link-dark">&#8592;</a>

    	   <div class="d-flex align-items-center">

    	   </div>

    	   <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box"
    	        id="chatBox"  style="height: 400px; overflow-y:scroll">

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
padding:5px; border-radius:10px; max width:70%;">
'.$chat["message"].'
</p>
</div>';}
else{
echo '<div style="text-align:leftt;">
<p style="background-color: yellow; word-wrap: break-word; display:inline-block;
padding:5px; border-radius:10px; max width:70%;">
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
}
?>
  </div>
</div></div>
</section>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="ajax\ajax.js"></script>
  </body>
</html>