<?php

$can_id=$_POST['can_id'];
$rec_id=$_POST['rec_id'];
$message=$_POST['message'];
$choix=$_POST['choix'];
include "../../../config.php";
$con=config::connect();
$sql=$con->prepare("insert into messages (can_id,rec_id,receive,message)values(:can_id,:rec_id,:choix,:message)");
$sql->bindParam(':can_id',$can_id);
$sql->bindParam(':rec_id',$rec_id);
$sql->bindParam(':message',$message);
$sql->bindParam(':choix',$choix);
try {
 $sql->execute();
 $idlastmessage = $con->lastInsertId();
$res = [
    'status' => 200,
    'message' => [
        'html' => '<div style="text-align:right;">
                    <p style="background-color: lightblue; word-wrap: break-word; display:inline-block;
                    padding:5px; border-radius:10px; max width:70%;">
                    '.$message.'
                    </p>
                    </div>'
    ]
,'idlastmessage' => $idlastmessage
];
} catch (PDOException $e) {
    $res = [
        'status' => 400,
        'message' => "not inserted"
    ];}

echo json_encode($res);
return;
?>