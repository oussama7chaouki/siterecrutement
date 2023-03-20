<?php
include('config.php');

session_start();

if(isset($_POST['delete_btn2'])){

    $con = config::connect(); 

    $id=$_POST['delete_id2'];
    $query = $con->prepare("DELETE FROM users WHERE id = :id");
    $query->bindParam(':id', $id);

    try {
        if($query->execute()){
            $_SESSION['succes2']="your Data is DELETED";
            header('location:candidat.php');
            exit();
        }
        else{
            $_SESSION['status2']="your Data is NOT DELETED";
            header('location:candidat.php');
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>