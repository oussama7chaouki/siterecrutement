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
function getallcandidature($con){

$stmt=$con->prepare("select username,id from users ");
$stmt->execute();
$data=$stmt->fetchall(pdo::FETCH_ASSOC);
return $data;
}

function getallrecruter($con){

    $stmt=$con->prepare("select username,id from recruters ");
    $stmt->execute();
    $data=$stmt->fetchall(pdo::FETCH_ASSOC);
    return $data;
    }




?>