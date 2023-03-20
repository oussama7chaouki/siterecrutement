<?php
include('config.php');

$con = config::connect(); 

if(isset($_GET['status']) && isset($_GET['id'])){
    
$id=$_GET['id'];
$status=$_GET['status'];




$query=$con->prepare("

UPDATE users SET
            status=:status
            WHERE id=:id


");
$query->bindParam(":status",$status);
$query->bindParam(":id",$id);

$query->execute();
header('location:candidat.php');

}




?>