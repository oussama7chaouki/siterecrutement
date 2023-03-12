<?php
//warning cuz session open in files and not in other
error_reporting(E_ALL & ~E_NOTICE); 
session_start();
                            require 'config.php';
                            $con = config::connect(); // The :: notation is used to call a static method on a class
                            $username=$_SESSION['username'];
                            
                            $stmt = $con->query("SELECT id FROM users where username='$username'
                            ");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $user_id= $stmt->fetchColumn();
                        ?>