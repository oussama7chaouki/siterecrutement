<?php
session_start();
// require 'dbcon1.php';
// $con = config::connect(); // The :: notation is used to call a static method on a class
// // if(isset($_POST['save_apply']))
// // {
    
//     $user_id=70;
require "../user_id.php";
    // $candidature = $_POST['candidature'];
    $id_jobs = $_POST['id'];
    $job_title = $_POST['title'];
    $company = $_POST['company'];
//  $scores=json_decode($_POST['score'], true);
$scores=$_POST['score'];
// echo $scores;
$score=$scores['score'];
$reqfor=$scores['reqfor'];
$reqexp=$scores['reqexp'];
$reqskill=$scores['reqskill'];


    if( $id_jobs == NULL || $job_title == NULL || $company == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'Something is wrong'
        ];
        echo json_encode($res);
        return;
    }

    $query = $con->prepare(" 
    INSERT INTO candidature (user_id, id_job, job_title,company,score,reqfor,reqexp,reqskill)
                             VALUES ($user_id, :id_jobs, :job_title,:company,:score,:reqfor,:reqexp,:reqskill)
                             ");
    $query->bindParam(":id_jobs",$id_jobs);
    $query->bindParam(":job_title",$job_title);
    $query->bindParam(":company",$company);
    $query->bindParam(":score",$score);
    $query->bindParam(":reqfor",$reqfor);
    $query->bindParam(":reqexp",$reqexp);
    $query->bindParam(":reqskill",$reqskill);

    try {
        $query->execute();

        $res = [
            'status' => 200,
            'message' => 'Application done'
        ];
        echo json_encode($res);
        return;
    } catch(PDOException $e) {
        $res = [
            'status' => 500,
            'message' => 'Application not done'
        ];
        echo json_encode($res);
        return;
    }


// }

?>
