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
      $_SESSION['tmpusernamerec']=$username;
     $_SESSION['rec_id']=recid($con,$username);
    //  $_SESSION['tmpusername']=$username;

     $otp = rand(100000,999999);
     $_SESSION['otp'] = $otp;
     $_SESSION['mail'] = $email;
     require "Mail/phpmailer/PHPMailerAutoload.php";
     $mail = new PHPMailer;

     $mail->isSMTP();
     $mail->Host='smtp.gmail.com';
     $mail->Port=587;
     $mail->SMTPAuth=true;
     $mail->SMTPSecure='tls';

     $mail->Username='oussamahamzahichamikram@gmail.com';
     $mail->Password='hkajujwtaupsngad';

     $mail->setFrom('email account', 'OTP Verification');
     $mail->addAddress($_POST["email"]);

     $mail->isHTML(true);
     $mail->Subject="Your verify code";
     $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
     <br><br>
     <p>With regrads,</p>
     <b>Weelcome To Dream JOB </b>
";

             if(!$mail->send()){
                 ?>
                     <script>
                         alert("<?php echo "Register Failed, Invalid Email "?>");
                     </script>
                 <?php
             }else{
                 ?>
                 <script>
                     alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                     window.location.replace('verification.php');
                 </script>
                 <?php
             }
    //  header("location:profilrecruteur.php");
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
    $_SESSION['rec_id']=recid($con,$username);
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
  if(isset($_POST['loginCheck']))
  {
    setcookie('usernamerecd',$_POST['username'],time()+60*60);//1 hour
    setcookie('passworrecd',$_POST['password'],time()+60*60); //1 hour
  }
  else
  {
    setcookie('usenamerecd',$username,time()-10);//10 seconds
    setcookie('passworrecd',$password,time()-10); //10 seconds
  }
  $query = $con->prepare("SELECT * FROM recruters WHERE username=:username AND password=:password");
  $query->bindParam(":username", $username);
  $query->bindParam(":password", $password);
  $query->execute();

  if($query->rowCount() > 0) {
      $user = $query->fetch(PDO::FETCH_ASSOC);
      if($user['status'] == 0) {
          // User is disabled
          header("location:loginrecruter.php?error=Your account has been disabled.");
          exit();
      }
      else if($user['activation'] == 0){
        header("location:loginrecruter.php?error=Please verify email account before login.");
        exit();
        ////////////////////////////////
      }
    return true;
}
else{
    return false;
}
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


if(isset($_POST['confirmer4'])){
    
  $con = config::connect(); // The :: notation is used to call a static method on a class

  $companynom = sanitizeString($_POST['companynom']);
  
  $Contact_Person_name = sanitizeString($_POST['Contact_Person_name']);
  $Contact_Person_email= sanitizeString($_POST['Contact_Person_email']);
  $tel= sanitizeString($_POST['Contact_Person_phone_number']);
  $address=sanitizeString($_POST['address']);

$rec_id=$_SESSION['rec_id'];


  $id_company=companyid($con,$rec_id);



 
  // $query=$con->prepare("
  // SELECT id_company FROM company WHERE rec_id=$rec_id
  // ");
  // // $query->bindParam(":nom",$currentUserName);
  // $query->execute();

  

  if(update4($con, $id_company ,$companynom ,  $Contact_Person_name,   $address,  $tel)){ ;
 
       

       echo "<script>window.location.href = 'profilrecruteur.php';</script>";
        exit;
     }
    



}


function update4($con,$id_company,$companynom,$Contact_Person_name,$address,$tel,){

  $query=$con->prepare("
  
  UPDATE company SET
  name=:name,person_name=:person_name,person_email=:person_email,tel=:tel,address=:address
  WHERE id_company=:id_company
  
  ");

$query->bindParam(":name",$companynom );
$query->bindParam(":person_name",$Contact_Person_name);
$query->bindParam(":person_email",$Contact_Person_name);
$query->bindParam(":address",$address);
$query->bindParam(":tel",$tel);

$query->bindParam(":id_company",$id_company);

try {
$query->execute() ;
    // echo "UPDATE query executed successfully.";
    return true;
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  return false;
}



}
//----**************------------


if (isset($_POST['Confirmer'])) {


  $con = config::connect(); // The :: notation is used to call a static method on a class

  $name= sanitizeString($_POST['companynom']);
  $nameperson = sanitizeString($_POST['Contact_Person_name']);
  

  $emailperson = sanitizeString($_POST['Contact_Person_email']);
  $telperson = sanitizeString($_POST['Contact_Person_phone_number']);
  $address = sanitizeString($_POST['Address']);

  $rec_id=$_SESSION['rec_id'];








 if(insert4($con,$name,$rec_id,$nameperson,$emailperson,$telperson, $address)){ 


  header('location:profilrecruteur.php');
  exit();
  
    
 }

}



function insert4($con, $name,$rec_id, $nameperson ,$emailperson, $telperson,$address) {

  $query = $con->prepare("
    INSERT INTO company (name,rec_id, person_name, person_email, tel, address)
    VALUES (:name,:rec_id,:nameperson ,:emailperson,:telperson,:address)
  ");
  $query->bindParam(":name", $name);
  $query->bindParam(":nameperson", $nameperson);
  $query->bindParam(":emailperson", $emailperson);
  $query->bindParam(":telperson", $telperson);
  $query->bindParam(":address", $address);
  $query->bindParam(":rec_id", $rec_id);


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

function recid($con,$username){
  echo "hello";
  $stmt = $con->query("SELECT id FROM recruters where username='$username'
     ");
     $stmt->execute();
     $rec_id= $stmt->fetchColumn();
     return $rec_id;
}
function companyid($con,$rec_id){
  $stmt = $con->query("SELECT id_company FROM company where rec_id='$rec_id'
     ");
     $stmt->execute();
     $company_id= $stmt->fetchColumn();
     return $company_id;
}

?>
