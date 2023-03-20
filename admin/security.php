<?php

session_start();



if(!$_SESSION['emailadmin']){
    header('location:login.php');
}


?>