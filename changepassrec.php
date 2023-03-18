<?php
session_start();
// include_once("config.php"); // function class
include_once('config.php');

$con = config::connect();

$username= $_SESSION['usernamerec'];
 
  $stmt = $con->query("SELECT id FROM recruters where username='$username'
     ");
     $stmt->execute();
     $id= $stmt->fetchColumn();
    
     


error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_POST['confirmer4'])){

     $con=config::connect();
   
    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {      
        $op = $_POST['op'];
        $np = $_POST['np'];
        $c_np = $_POST['c_np'];
        
        // hashing the password
        $op = md5($op);
        $np = md5($np);

        // if(isset($_SESSION['id'])) {
        //     $id = $_SESSION['id'];

            $stmt = $con->prepare("SELECT password FROM recruters WHERE id=$id AND password=:op ");
            // $stmt->bindParam(':id', $id);
            $stmt->bindParam(':op', $op);
            $stmt->execute();
            echo 'hello';

            if($stmt->rowCount() === 1){
                $stmt1 = $con->prepare("UPDATE recruters SET password=:np WHERE id=$id");
                $stmt1->bindParam(':np', $np);
                // $stmt->bindParam(':id', $id);
             
                try{
 

                    header("location:profilrecruteur.php");
                    exit();
                    echo 'updates succs';

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    return false;
                }
            } 
            else{
                
                header("location:modifyrec.php?wrong password");            }
        }
    }

?> 
