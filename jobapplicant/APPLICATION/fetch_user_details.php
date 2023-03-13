<?php

require 'dbcon1.php';
 $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $user_id=3;
                            $user_id=$_POST['user_id'];
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

                            $response = array(
                              "array0"=>$data0,
                                "array1" => $data,
                                "array2" => $data1,
                                "array3" => $data2
                              );     
                              echo json_encode($response);
                      