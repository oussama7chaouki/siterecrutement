<?php



require('userid.php');
if(isset($_POST['save_experience']))
{
   
    
    $experience = $_POST['experience'];
    $company = $_POST['company'];
    $startyear = $_POST['startyear'];
    $endyear = $_POST['endyear'];


    

    if($experience == NULL || $company == NULL || $startyear == NULL || $endyear == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare(" 
    INSERT INTO experiences (experience,user_id,company, startyear,endyear)
                             VALUES (:experience,:user_id, :company,:startyear,:endyear)
                             ");
    $query->bindParam(":experience",$experience);
    $query->bindParam(":company",$company);
    $query->bindParam(":startyear",$startyear);
    $query->bindParam(":endyear",$endyear);
    $query->bindParam(":user_id",$user_id);

    try {
        $query->execute();

        $res = [
            'status' => 200,
            'message' => 'experience Created Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => $e->getMessage()
            // 'experience Not Created'
        ];
        echo json_encode($res);
        return;
    }


}


if(isset($_POST['update_experience']))
{
    $experience_id = $_POST['experience_id'];

    $experience = $_POST['experience'];
    $company = $_POST['company'];
    $startyear = $_POST['startyear'];
    $endyear = $_POST['endyear'];

    if($experience == NULL || $company == NULL || $startyear == NULL || $endyear == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare("UPDATE `experiences` SET `experience` = :experience, `company`=:company , `startyear`=:startyear , `endyear`=:endyear WHERE `id_experience`='$experience_id'");
    $query->bindParam(":experience",$experience);
    $query->bindParam(":company",$company);
    $query->bindParam(":startyear",$startyear);
    $query->bindParam(":endyear",$endyear);
    
 try {
    $query->execute();

    $res = [
        'status' => 200,
        'message' => 'experience Updated Successfully'
    ];
    echo json_encode($res);
    return;
} catch(PDOException $e) {
    $res = [
        'status' => 500,
        'message' => 'experience Not updated'
    ];
    echo json_encode($res);
    return;
}


}



if(isset($_GET['experience_id']))
{
    $experience_id = $_GET['experience_id'];
    $query =$con->prepare("SELECT * FROM experiences WHERE id_experience='$experience_id'") ;
    $query->execute();
    $experience = $query->fetch(PDO::FETCH_ASSOC);



    if($experience)
    {

        $res = [
            'status' => 200,
            'message' => 'experience Fetch Successfully by id',
            'data' => $experience
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'experience Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_experience']))
{
    $experience_id = $_POST['experience_id'];
    $query =$con->prepare("DELETE FROM experiences WHERE id_experience='$experience_id'") ;

    try {
        $query->execute();
    
        $res = [
            'status' => 200,
            'message' => 'experience Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => 'experience Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
