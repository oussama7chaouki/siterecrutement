<?php
session_start();

include_once("user_id.php"); // function class




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="hicham2.css">
    <script src="https://kit.fontawesome.com/31a9ea36c8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
 
<?php include 'sidebar.php'?>

<section>

<?php 
$query = $con->prepare("
SELECT information.*,email FROM `information`,users WHERE `user_id`=id and user_id=$user_id");
$query->execute();
$datas=$query->fetchAll(PDO::FETCH_ASSOC);
$datas=$datas[0];
// print_r($datas) ;
$nom=$datas['nom'];
$prenom=$datas['prenom'];
$dob=$datas['date'];
$email=$datas['email'];
$genre=$datas['genre'];
$tel=$datas['tel'];
$date=$datas['date'];
$pays="Maroc";
$ville=$datas['ville'];


 $_SESSION['nom']=$nom;
 $_SESSION['prenom']=$prenom;
 $_SESSION['date']=$date;// Replace with the actual date of birth
 $_SESSION['ville']=$ville;
  


?>

<div class="container green-line">
  <div class="border shadow p-3 rounded"  style="height:590px;"  action="process.php" method="post" id="myform">
    <h2 style="font-size:22px;" class="text-muted"><?=$nom?> <?=$prenom?>&#x1F1F2;&#x1F1E6;<span style="font-size:15.5px">(<?php
    
    
    $current_date = date('Y-m-d');
  //  $dob = $_SESSION['date']; // Replace with the actual date of birth
   $dob_timestamp = strtotime($dob);
   $age = floor((time() - $dob_timestamp) / 31536000);
   echo $age ."ans" ;
    ?> habite à <?php echo $ville?> )</span>
    
    </h2>
    <hr class="my-4 blue-line">

<div class="mb-3" >
      
<div class="row">
<div class="col-md-6">
<div class="list-group">
<div class="list-group-item">
<h4 style="color:grey;font-size:20px" class="list-group-item-heading">Email</h4>
<p class="list-group-item-text"><?=$email?></p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >Prénom</h4>
<p class="list-group-item-text"><?=$prenom?> </p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px">Nom</h4>
<p class="list-group-item-text"><?=$nom?></p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >Civilité</h4>
<p class="list-group-item-text"><?=$genre?></p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="list-group">
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >GSM</h4>
<p class="list-group-item-text"><?=$tel?></p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >Date de naissance</h4>
<p class="list-group-item-text"><?=$date?></p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >Pays</h4>
<p class="list-group-item-text"><?=$pays?></p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >Ville de résidence</h4>
<p class="list-group-item-text"><?=$ville?></p>
</div>
</div>
</div>
</div>


      
    <br>
    <hr class="my-4 blue-line">

<a class="btn btn-success dim" href="modifier.php">
<i class="fa fa-pencil"></i> Modifier </a>

    
     
    </div>

</div>
</section>




