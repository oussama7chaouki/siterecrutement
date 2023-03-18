<?php
session_start();

 include_once("recruter_id.php"); // function class



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
    
 
<?php  include "sidebarrec.php"?> 

<section>

<?php 
$query = $con->prepare("
SELECT * FROM company where rec_id=$rec_id");
$query->execute();
$count = $query->rowCount();
if($count<1){
  header("location:company.php");
  exit();
}
$datas=$query->fetchAll(PDO::FETCH_ASSOC);
$datas=$datas[0];

$companyname=$datas['name'];
$id_company=$datas['id_company'];
$personame=$datas['person_name'];
$email=$datas['person_email'];

$tel=$datas['tel'];
$address=$datas['address'];
$pays="Maroc";
$id_rec=$datas['rec_id'];



 $_SESSION['name']=$companyname;
 $_SESSION['person_name']=$personame;
 $_SESSION['person_email']=$email;

 $_SESSION['tel']=$tel;
 $_SESSION['address']=$address;
$_SESSION['id_company']=$id_company;

?>

<div class="container green-line">
  <div class="border shadow p-3 rounded"  style="height:590px;"  action="process.php" method="post" id="myform">
    
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
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >companynom</h4>
<p class="list-group-item-text"><?=$companyname?> </p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px">personname</h4>
<p class="list-group-item-text"><?=$personame?></p>
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
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >address</h4>
<p class="list-group-item-text"><?=$address?></p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading" style="color:grey;font-size:20px" >Pays</h4>
<p class="list-group-item-text"><?=$pays?></p>
</div>

</div>
</div>
</div>


      
    <br>
    <hr class="my-4 blue-line">
    <div class="d-flex justify-content-around">

<a class="btn btn-success dim" href="modifyrec.php">
<i class="fa fa-pencil"></i> Modifier </a>

</div>
    
     
    </div>

</div>
</section>




