<?php
session_start();

include_once("config.php"); // function class

if (isset($_POST['register'])) {
  $con = config::connect(); // The :: notation is used to call a static method on a class

  $username = sanitizeString($_POST['username']);
  $name = sanitizeString($_POST['name']);
  
  $email = sanitizeString($_POST['email']);
  $password =sanitizePassword($_POST['password']);
  $re_password=sanitizePassword($_POST['re_password']);




  if(empty($username)){
    header("location:loginrecruter.php?error=Username is required");
    exit();

   } elseif(empty($name)){
        header("location:loginrecruter.php?error=email is required");
        exit(); 


}elseif(empty($email)){
    header("location:loginrecruter.php?error=email is required");
    exit(); 

}elseif(empty($password)){
  header("location:loginrecruter.php.php?error=password is required");
  exit(); 


  

}elseif($password !== $re_password){
    header("location:loginrecruter.php?error=the confirmation password does not match");
    exit();

}
else{

  if(!checkusernameexist($con,$username)){
     header("location:loginrecruter.php?error=username is exist");
    exit(); 
  }
  if(!checkemailexist($con,$email)){
    header("location:loginrecruter.php?error=email is exist");
    exit(); 
    
   }




 if(insert($con,$username,$email,$password, $re_password,$name)){ ;
     $_SESSION['username']=$username;
     header("location:profilrecruter.php");
 }

}

}

//login************************
if (isset($_POST['signin'])) {
    $con = config::connect(); // The :: notation is used to call a static method on a class
  
    $username = sanitizeString($_POST['username']);

    $password = sanitizePassword($_POST['password']);

    if(empty($username)){
        header("location:loginrecruter.php?error=Username is required");
        exit();
    }elseif(empty($password)){
        header("location:loginrecruter.php?error=password is required");
        exit(); 
    }
    
  else{


if(checklogin($con,$username,$password)){

    $_SESSION['usernamerec']=$username;
     header("location:profilrecruter.php");

}else{
    header("location:loginrecruter.php?error=Username or the  password are incorrect!");
    exit();
}
}
}

// if(isset($_POST['update'])){
//     $con = config::connect(); // The :: notation is used to call a static method on a class

//   $username = sanitizeString($_POST['username']);
  
//   $email = sanitizeString($_POST['email']);
//   $password = sanitizePassword($_POST['password']);

//   $currentUserName=$_SESSION['username'];
//   $query=$con->prepare("
//   SELECT * FROM recruters WHERE username=:username
//   ");
//   $query->bindParam(":username",$currentUserName);
//   $query->execute();
//   $result=$query->fetch(PDO::FETCH_ASSOC);
//   $id=$result['id'];
 
//   /*

// $currentUserName=$_SESSION['username']; retrieves the value of the username key from the $_SESSION superglobal and assigns it to the $currentUserName variable.
// $query=$con->prepare("SELECT * FROM recruters WHERE username=:username"); prepares an SQL statement to select all columns from the recruters table where the username column matches the :username parameter.
// $query->bindParam(":username",$currentUserName); binds the value of $currentUserName to the :username parameter in the prepared SQL statement.
// $result=$query-fetch(PDO::FETCH_ASSOC); executes the prepared SQL statement and fetches the first row of the result set as an associative array, which is stored in the $result variable. PDO::FETCH_ASSOC tells the PDO to fetch the row as an associative array.
// $id=result['id']; extracts the value of the id column from the associative array stored in the $result variable and assigns it to the $id variable.
// */



//  if(update($con,$id,$username,$email,$password)){ ;
     
//     $_SESSION['username']=$username;
//      header("Location:profil.php");
//  }




// }

  
function insert($con,$username,$email,$password,$re_password,$name) {
    $query = $con->prepare(" 
    INSERT INTO recruters (username, email, password,re_password,name)
                             VALUES (:username, :email, :password,:re_password,:name)
                             ");
    $query->bindParam(":username",$username);
    $query->bindParam(":email",$email);
    $query->bindParam(":password",$password);
    $query->bindParam(":re_password",$re_password);
    $query->bindParam(":name",$name);




    
    try {
        $query->execute();
        return true;
    } catch(PDOException $e) {
        // handle the error here, for example log it or display a user-friendly message
        echo "Error: " . $e->getMessage();
        return false;
    }

  



}

function checklogin($con,$username,$password){


$query=$con->prepare("

SELECT * FROM recruters WHERE username=:username AND password=:password

");
$query->bindParam(":username",$username);

$query->bindParam(":password",$password);

$query->execute();
if($query->rowCount()==1){
    return true;
}
else{
    return false;
}
}


function sanitizeString($string){
    $string=strip_tags($string);
    $string=str_replace(" ","",$string);
    return $string;
}

function sanitizePassword($string){
  if(!empty($string)){
   $string=md5($string);
    return $string;
}
}


function update($con,$id,$username,$email,$password){

    $query=$con->prepare("
    
    UPDATE recruters SET
    username=:username,email=:email,password=:password
    WHERE id=:id
    
    ");

  $query->bindParam(":username",$username);
  $query->bindParam(":email",$email);
  $query->bindParam(":password",$password);
  $query->bindParam(":id",$id);

 return $query->execute();


}


function checkusernameexist($con,$username){
    $query=$con->prepare("
  SELECT * FROM recruters WHERE username=:username
  ");
  $query->bindParam(":username",$username);
  $query->execute();

  if($query->rowCount() == 1){
    return false;
  }else{
    return true;
  }


}

function checkemailexist($con,$email){
    $query=$con->prepare("
  SELECT * FROM recruters WHERE email=:email
  ");
  $query->bindParam(":email",$email);
  $query->execute();

  if($query->rowCount() == 1){
    return false;
  }else{
    return true;
  }


}



?>
