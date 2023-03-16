<?php  

function getUser($username, $conn){
   $sql0 = "SELECT id FROM users 
           WHERE username=?";
   $stmt0 = $conn->prepare($sql0);
   $stmt0->execute([$username]);
$user_id= $stmt0->fetch()["id"];
$sql = "SELECT * FROM users,information 
WHERE information.user_id=users.id and users.id=$user_id";
$stmt = $conn->prepare($sql);
$stmt->execute();

   if ($stmt->rowCount() === 1) {
   	 $user = $stmt->fetch();
   	 return $user;
   }else {
   	$user = [];
   	return $user;
   }
}