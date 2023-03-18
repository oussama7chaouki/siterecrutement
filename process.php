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
    header("location:login.php?error=Username is required");
    exit();

   } elseif(empty($name)){
        header("location:login.php?error=email is required");
        exit(); 


}elseif(empty($email)){
    header("location:login.php?error=email is required");
    exit(); 

}elseif(empty($password)){
  header("location:login.php?error=password is required");
  exit(); 


  

}elseif($password !== $re_password){
    header("location:login.php?error=the confirmation password does not match");
    exit();

}
else{

  if(!checkusernameexist($con,$username)){
     header("location:login.php?error=username is exist");
    exit(); 
  }
  if(!checkemailexist($con,$email)){
    header("location:login.php?error=email is exist");
    exit(); 
    
   }




 if(insert($con,$username,$email,$password, $re_password,$name)){ ;
     $_SESSION['username']=$username;
     $_SESSION['user_id']=userid($con,$username);


     header("location:profilcandidat.php");
 }

}

}

//login************************
if (isset($_POST['signin'])) {
    $con = config::connect(); // The :: notation is used to call a static method on a class
  
    $username = sanitizeString($_POST['username']);

    $password = sanitizePassword($_POST['password']);

    if(empty($username)){
        header("location:login.php?error=Username is required");
        exit();
    }elseif(empty($password)){
        header("location:login.php?error=password is required");
        exit(); 
    }
    
  else{


if(checklogin($con,$username,$password)){

    $_SESSION['username']=$username;
    $_SESSION['user_id']=userid($con,$username);
     header("location:profil.php");

}else{
    header("location:login.php?error=Username or the  password are incorrect!");
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
//   SELECT * FROM users WHERE username=:username
//   ");
//   $query->bindParam(":username",$currentUserName);
//   $query->execute();
//   $result=$query->fetch(PDO::FETCH_ASSOC);
//   $id=$result['id'];
 
//   /*

// $currentUserName=$_SESSION['username']; retrieves the value of the username key from the $_SESSION superglobal and assigns it to the $currentUserName variable.
// $query=$con->prepare("SELECT * FROM users WHERE username=:username"); prepares an SQL statement to select all columns from the users table where the username column matches the :username parameter.
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
    INSERT INTO users (username, email, password,re_password,name)
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

SELECT * FROM users WHERE username=:username AND password=:password

");
$query->bindParam(":username",$username);

$query->bindParam(":password",$password);

$query->execute();
if($query->rowCount()==1){
  $user = $query->fetch(PDO::FETCH_ASSOC);
  if($user['status'] == 0) {
      // User is disabled
      header("location:login.php?error=Your account has been disabled.");
      exit();}
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
    
    UPDATE users SET
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
  SELECT * FROM users WHERE username=:username
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
  SELECT * FROM users WHERE email=:email
  ");
  $query->bindParam(":email",$email);
  $query->execute();

  if($query->rowCount() == 1){
    return false;
  }else{
    return true;
  }


}

function userid($con,$username){
  $stmt = $con->query("SELECT id FROM users where username='$username'
     ");
     $stmt->execute();
     $user_id= $stmt->fetchColumn();
     return $user_id;
}


//**********information personnel*********






if (isset($_POST['suivant'])) {
  $con = config::connect(); 
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $ville = $_POST['ville'];
  $tel = $_POST['tel'];
  $genre = isset($_POST['genre']) ? substr($_POST['genre'], 0, 50) : '';
  $date = isset($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : null; // Convert date string to MySQL date format
  $select=$_POST['select'];

 

  if (insert1($con, $nom, $prenom, $ville, $date, $tel, $genre,$select)) {
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['date'] = $date;
    $_SESSION['ville'] = $ville;
    $_SESSION['genre']=$genre;
    $_SESSION['tel']=$tel;

    echo "<script>window.location.href = 'testupload/index.php';</script>";
    exit;
  } 
}


function insert1($con, $nom, $prenom, $ville, $date, $tel, $genre,$select) {
  require 'user_id1.php';
  $query = $con->prepare("
    INSERT INTO information (nom, prenom, ville, date, tel, genre,`select`,user_id)
    VALUES (:nom, :prenom, :ville, :date, :tel, :genre,:select,$user_id)
  ");
  $query->bindParam(":nom", $nom);
  $query->bindParam(":prenom", $prenom);
  $query->bindParam(":ville", $ville);
  $query->bindParam(":date", $date);
  $query->bindParam(":tel", $tel);
  $query->bindParam(":genre", $genre);
  $query->bindParam(":select", $select);

  try {
    if ($query->execute()) {
      echo "Insert query executed successfully.";
      return true;
    } else {
      echo "Insert query failed.";
      return false;
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return false;
  }
}









if(isset($_POST['confirmer1'])){
    
  $con = config::connect(); // The :: notation is used to call a static method on a class

  $nom = sanitizeString($_POST['nom']);
  
  $prenom = sanitizeString($_POST['prenom']);
  $ville= sanitizeString($_POST['ville']);
  $tel= sanitizeString($_POST['tel']);
  $date=$_POST['date'];
  $genre=$_POST['genre'];

  require 'user_id1.php';
  // $currentUserName=$_SESSION['nom'];
  $query=$con->prepare("
  SELECT id_information FROM information WHERE user_id=$user_id
  ");
  // $query->bindParam(":nom",$currentUserName);
  $query->execute();
  
  $id_information=$query->fetchcolumn();
  if(update1($con, $id_information ,$nom, $prenom, $ville, $date, $tel, $genre)){ ;
     
        $_SESSION['nom']=$nom;
        $_SESSION['prenom']=$prenom;
        $_SESSION['ville']=$ville;
        $_SESSION['date']=$date;
        $_SESSION['tel']=$tel;
        $_SESSION['genre']=$genre;

        echo "<script>window.location.href = 'profilcandidat1.php';</script>";
        exit;
     }
    



}


function update1($con, $id_information ,$nom, $prenom, $ville, $date, $tel, $genre){

  $query=$con->prepare("
  
  UPDATE information SET
  nom=:nom,prenom=:prenom,ville=:ville,date=:date,tel=:tel,genre=:genre
  WHERE id_information=:id_information
  
  ");

$query->bindParam(":nom",$nom);
$query->bindParam(":prenom",$prenom);
$query->bindParam(":ville",$ville);
$query->bindParam(":date",$date);
$query->bindParam(":tel",$tel);
$query->bindParam(":genre",$genre);
$query->bindParam(":id_information",$id_information);



return $query->execute();


}

/**************   fin process information personele         */




?>
