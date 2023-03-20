<?php
include('config.php');

$con = config::connect(); 

if(isset($_GET['status1']) && isset($_GET['id'])){
    
$id=$_GET['id'];
$status1=$_GET['status1'];




$query=$con->prepare("

UPDATE recruters SET
            status=:status
            WHERE id=:id


");
$query->bindParam(":status",$status1);
$query->bindParam(":id",$id);

$query->execute();
header('location:recruteur.php');

}




?>