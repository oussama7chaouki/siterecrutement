<?php

require 'dbcon1.php';
$con = config::connect(); // The :: notation is used to call a static method on a class

if(isset($_POST['delete_candidature']))
{
    $candidature_id = $_POST['candidature_id'];
    $query =$con->prepare("DELETE FROM candidature WHERE id_candidature='$candidature_id'") ;
    // $query->bindParam(":user_id",$user_id);

    try {
        $query->execute();
    
        $res = [
            'status' => 200,
            'message' => 'candidature Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => 'candidature Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
