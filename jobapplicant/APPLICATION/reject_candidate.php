<?php
require 'dbcon1.php';
 $con = config::connect(); // The :: notation is used to call a static method on a class
 $id_candidature=$_POST['id_candidature'];
//  $user_id=$_POST['$user_id'];
 $query= $con->prepare("UPDATE `candidature` SET `status` = 'Rejected' WHERE `candidature`.`id_candidature` =$id_candidature ");
 try {
    $query->execute();

    $res = [
        'status' => 200,
        'message' => 'candidat rejected Successfully'
    ];
    echo json_encode($res);
    return;
} catch(PDOException $e) {
    $res = [
        'status' => 500,
        'message' => $e->getMessage()
        // 'job_title Not Created'
    ];
    echo json_encode($res);
    return;
}