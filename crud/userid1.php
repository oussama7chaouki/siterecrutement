<?php
                            $username=$_SESSION['username'];
                           $stmt = $con->query("SELECT id FROM users where username='$username'
                            ");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $user_id= $stmt->fetchColumn();
                        ?>