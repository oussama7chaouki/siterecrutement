<?php function getrecruter($con,$id){

$stmt=$con->prepare("select * from recruters where id=:id");
$stmt->bindParam(":id",$id);
$stmt->execute();
$data=$stmt->fetch(pdo::FETCH_ASSOC);
return $data;
}
function getcandidature($con,$id){

$stmt=$con->prepare("select * from users where id=:id");
$stmt->bindParam(":id",$id);
$stmt->execute();
$data=$stmt->fetch(pdo::FETCH_ASSOC);
return $data;
}function getinforecruter($con,$id){

$stmt=$con->prepare("select * recinformation where rec_id=:id");
$stmt->bindParam(":id",$id);
$stmt->execute();
$data=$stmt->fetch(pdo::FETCH_ASSOC);
return $data;
}
function getinfocandidature($con,$id){

$stmt=$con->prepare("select * information where user_id=:id");
$stmt->bindParam(":id",$id);
$stmt->execute();
$data=$stmt->fetch(pdo::FETCH_ASSOC);
return $data;
}
function getallcandidature($con,$rec_id){

// $stmt=$con->prepare("select username,id from users ");
$stmt=$con->prepare("SELECT DISTINCT users.username, users.id
FROM jobs
JOIN candidature ON jobs.id_job = candidature.id_job
JOIN users ON candidature.user_id = users.id
WHERE jobs.recruter_id = $rec_id");
$stmt->execute();
$data=$stmt->fetchall(pdo::FETCH_ASSOC);
return $data;
}

function getallrecruter($con,$user_id){

    // $stmt=$con->prepare("select username,id from recruters ");
    $stmt=$con->prepare("SELECT DISTINCT recruters.username, recruters.id
    FROM jobs
    JOIN candidature ON jobs.id_job = candidature.id_job
    JOIN recruters ON jobs.recruter_id = recruters.id
    WHERE candidature.user_id =$user_id");
    $stmt->execute();
    $data=$stmt->fetchall(pdo::FETCH_ASSOC);
    return $data;
    }




?>