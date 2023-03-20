<?php

// require 'dbcon1.php';
// $con = config::connect(); // The :: notation is used to call a static method on a class
require('userid.php');
if(isset($_POST['save_job']))
{
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $job_salaire = $_POST['job_salaire'];
    $domain = $_POST['domain'];
    $expreq=$_POST['expreq'];
    $formationreq=$_POST['formationreq'];
    $skillreq=$_POST['skillreq'];

    

    if($job_title == NULL || $job_description == NULL || $job_salaire == NULL || $domain == NULL || $expreq == NULL|| $formationreq == NULL|| $skillreq == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare(" 
    INSERT INTO jobs (job_title, job_description, job_salaire,domain,recruter_id,company,formationreq,skillreq,expreq)
                             VALUES (:job_title, :job_description, :job_salaire,:domain,$recruter_id,'$company_name',:formationreq,:skillreq,:expreq)
                             ");
    $query->bindParam(":job_title",$job_title);
    $query->bindParam(":job_description",$job_description);
    $query->bindParam(":job_salaire",$job_salaire);
    $query->bindParam(":domain",$domain);
    $query->bindParam(":expreq",$expreq);
    $query->bindParam(":formationreq",$formationreq);
    $query->bindParam(":skillreq",$skillreq);

    // $query->bindParam(":user_id",$user_id);


    try {
        $query->execute();

        $res = [
            'status' => 200,
            'message' => 'job Created Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' =>'job_title Not Created'
            // $e->getMessage()
        ];
        echo json_encode($res);
        return;
    }


}


if(isset($_POST['update_job']))
{
    $job_id = $_POST['job_id'];

    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $job_salaire = $_POST['job_salaire'];
    $domain = $_POST['domain'];
    $expreq=$_POST['expreq'];
    $formationreq=$_POST['formationreq'];
    $skillreq=$_POST['skillreq'];

    if($job_title == NULL || $job_description == NULL || $job_salaire == NULL || $domain == NULL || $expreq == NULL|| $formationreq == NULL|| $skillreq == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare("UPDATE `jobs` SET `job_title` = :job_title, `job_description`=:job_description , `job_salaire`=:job_salaire , `domain`=:domain , `expreq`=:expreq ,`formationreq`=:formationreq ,`skillreq`=:skillreq  WHERE `id_job`='$job_id'");
    $query->bindParam(":job_title",$job_title);
    $query->bindParam(":job_description",$job_description);
    $query->bindParam(":job_salaire",$job_salaire);
    $query->bindParam(":domain",$domain);
    $query->bindParam(":expreq",$expreq);
    $query->bindParam(":formationreq",$formationreq);
    $query->bindParam(":skillreq",$skillreq);
    // $query->bindParam(":user_id",$user_id); AND `user_id`=:user_id

    
 try {
    $query->execute();

    $res = [
        'status' => 200,
        'message' => 'job Updated Successfully'
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



if(isset($_GET['job_id']))
{
    $job_id = $_GET['job_id'];
    $query =$con->prepare("SELECT * FROM jobs WHERE id_job ='$job_id' ") ;
    // $query->bindParam(":user_id",$user_id);AND `user_id`=:user_id
    $query->execute();
    $job = $query->fetch(PDO::FETCH_ASSOC);



    if($job)
    {

        $res = [
            'status' => 200,
            'message' => 'job Fetch Successfully by id',
            'data' => $job
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'job Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_job']))
{
    $job_id = $_POST['job_id'];
    $query =$con->prepare("DELETE FROM jobs WHERE id_job ='$job_id'") ;
    // $query->bindParam(":user_id",$user_id);

    try {
        $query->execute();
    
        $res = [
            'status' => 200,
            'message' => 'job Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => 'job Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
