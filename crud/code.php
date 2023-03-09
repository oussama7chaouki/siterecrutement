<?php

// require 'dbcon1.php';
// $con = config::connect(); // The :: notation is used to call a static method on a class
require('userid.php');
if(isset($_POST['save_formation']))
{
    $formation = $_POST['formation'];
    $school = $_POST['school'];
    $startyear = $_POST['startyear'];
    $endyear = $_POST['endyear'];


    

    if($formation == NULL || $school == NULL || $startyear == NULL || $endyear == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare(" 
    INSERT INTO formations (formation,user_id, school, startyear,endyear)
                             VALUES (:formation,:user_id, :school, :startyear,:endyear)
                             ");
    $query->bindParam(":formation",$formation);
    $query->bindParam(":school",$school);
    $query->bindParam(":startyear",$startyear);
    $query->bindParam(":endyear",$endyear);
    $query->bindParam(":user_id",$user_id);


    try {
        $query->execute();

        $res = [
            'status' => 200,
            'message' => 'formation Created Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => 'formation Not Created'
        ];
        echo json_encode($res);
        return;
    }


}


if(isset($_POST['update_formation']))
{
    $formation_id = $_POST['formation_id'];

    $formation = $_POST['formation'];
    $school = $_POST['school'];
    $startyear = $_POST['startyear'];
    $endyear = $_POST['endyear'];

    if($formation == NULL || $school == NULL || $startyear == NULL || $endyear == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare("UPDATE `formations` SET `formation` = :formation, `school`=:school , `startyear`=:startyear , `endyear`=:endyear WHERE `id_formation`='$formation_id'");
    $query->bindParam(":formation",$formation);
    $query->bindParam(":school",$school);
    $query->bindParam(":startyear",$startyear);
    $query->bindParam(":endyear",$endyear);
    // $query->bindParam(":user_id",$user_id); AND `user_id`=:user_id

    
 try {
    $query->execute();

    $res = [
        'status' => 200,
        'message' => 'formation Updated Successfully'
    ];
    echo json_encode($res);
    return;
} catch(PDOException $e) {
    $res = [
        'status' => 500,
        'message' => $e->getMessage()
    ];
    echo json_encode($res);
    return;
}


}



if(isset($_GET['formation_id']))
{
    $formation_id = $_GET['formation_id'];
    $query =$con->prepare("SELECT * FROM formations WHERE id_formation='$formation_id' ") ;
    // $query->bindParam(":user_id",$user_id);AND `user_id`=:user_id
    $query->execute();
    $formation = $query->fetch(PDO::FETCH_ASSOC);



    if($formation)
    {

        $res = [
            'status' => 200,
            'message' => 'formation Fetch Successfully by id',
            'data' => $formation
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'formation Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_formation']))
{
    $formation_id = $_POST['formation_id'];
    $query =$con->prepare("DELETE FROM formations WHERE id_formation='$formation_id'") ;
    // $query->bindParam(":user_id",$user_id);

    try {
        $query->execute();
    
        $res = [
            'status' => 200,
            'message' => 'formation Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => 'formation Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
