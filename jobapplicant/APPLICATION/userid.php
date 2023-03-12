<?php
//warning cuz session open in files and not in other
error_reporting(E_ALL & ~E_NOTICE); 
session_start();
                            require 'dbcon1.php';
                            $con = config::connect(); // The :: notation is used to call a static method on a class
                            $username=$_SESSION['username'];
                            
                            $stmt = $con->query("SELECT id,name FROM recruters where username='$username'
                            ");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $row = $stmt->fetch();
$recruter_id = $row['id'];
$company_name = $row['name'];
                            // $recruter_id= $stmt->fetchColumn();
                        ?>