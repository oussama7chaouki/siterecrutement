<?php
session_start();
require 'dbcon1.php';
 $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $user_id=3;
                            if(isset($_POST['user_id'])){

                              $user_id=$_POST['user_id'];
                            }
                            else if(isset($_GET['user_id'])){

                              $user_id=$_GET['user_id'];
                            }
                            else{
                              header('location:google.com');
                            }
                            $stmt0 = $con->query("SELECT * FROM information where user_id='$user_id'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt0->execute();
                            $data0 = $stmt0->fetch(PDO::FETCH_ASSOC);
                            $stmt = $con->query("SELECT * FROM formations where user_id='$user_id'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                            $stmt1 = $con->query("SELECT * FROM experiences where user_id='$user_id'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt1->execute();
                            $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                            $stmt2 = $con->query("SELECT * FROM skills where user_id='$user_id'");
                            $stmt2->execute();
                            $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC); 
                            $stmt3 = $con->query("SELECT * FROM languages where user_id='$user_id'");
                            $stmt3->execute();
                            $data3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

                            $response = array(
                              "array0"=>$data0,
                                "array1" => $data,
                                "array2" => $data1,
                                "array3" => $data2,
                                "array4" => $data3
                              );     
                              $_SESSION["response"]=$response;
                              echo json_encode($response);
                      