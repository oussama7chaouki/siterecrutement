<?php

require '../dbcon1.php';
 $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $user_id=3;
                            $id_candidature=$_POST['id_candidature'];
                            $stmt0 = $con->query("SELECT score,reqfor,reqexp,reqskill FROM candidature where id_candidature='$id_candidature'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt0->execute();
                            $data0 = $stmt0->fetch(PDO::FETCH_ASSOC);
                           

                            $response = array(
                              "array0"=>$data0
                              );     
                              echo json_encode($response);