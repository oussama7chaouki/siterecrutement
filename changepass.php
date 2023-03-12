<?php
session_start();
// include_once("config.php"); // function class
require('user_id.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_POST['confirmer2'])){
    // $con=config::connect();
   
    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {      
        $op = $_POST['op'];
        $np = $_POST['np'];
        $c_np = $_POST['c_np'];
        
        // hashing the password
        $op = md5($op);
        $np = md5($np);

        // if(isset($_SESSION['id'])) {
        //     $id = $_SESSION['id'];

            $stmt = $con->prepare("SELECT password FROM users WHERE id=$user_id AND password=:op ");
            // $stmt->bindParam(':id', $id);
            $stmt->bindParam(':op', $op);
            $stmt->execute();

            if($stmt->rowCount() === 1){
                $stmt1 = $con->prepare("UPDATE users SET password=:np WHERE id=$user_id");
                $stmt1->bindParam(':np', $np);
                // $stmt->bindParam(':id', $id);
             
                try{
                    echo $np;
                    echo 'hello';
                    $stmt1->execute();

                    header("location:profilcandidat1.php");
                    exit();

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    return false;
                }
            } 
        }
    }

?> 
