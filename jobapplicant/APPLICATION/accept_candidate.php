<?php
session_start();
require 'dbcon1.php';
 $con = config::connect(); // The :: notation is used to call a static method on a class
 $id_candidature=$_POST['id_candidature'];

  $user_id=$_POST['user_id'];
  $rec_id=$_SESSION['rec_id'];
 $query= $con->prepare("UPDATE `candidature` SET `status` = 'Accepted' WHERE `candidature`.`id_candidature` =$id_candidature ");
 $stmt=$con->prepare("insert into messages(can_id,rec_id,receive,message) values (?,?,1,'Your candidature has been accepted')");
 try {
    $query->execute();
$stmt->execute([$user_id,$rec_id]);
    $res = [
        'status' => 200,
        'message' => 'candidat accepted Successfully'
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