<?php

include('config.php');
session_start();

if(isset($_POST['registerbtn'])) {
  
    $con = config::connect(); 

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $re_password =md5($_POST['confirmpassword']);

    if($password === $re_password) {
        try {
            $query = $con->prepare("INSERT INTO admin (username, email, password, re_password1) VALUES (:username, :email, :password, :re_password)");
            $query->bindParam(":username",$username);
            $query->bindParam(":email",$email);
            $query->bindParam(":password",$password);
            $query->bindParam(":re_password",$re_password);
            $query->execute();

            $_SESSION['succes'] = "Admin profile added";
            header('location:register.php');
            exit;
        } catch(PDOException $e) {
            // Output more detailed error message
            echo "Error executing query: " . $e->getMessage();
            echo "Query: " . $query->queryString;
            return false;
        }
    } else {
        $_SESSION['status'] = "Password and confirm password do not match";
        header('location:register.php');
        exit;
    }
}

if(isset($_POST['updatebtn'])){
    $con = config::connect(); 
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $id=$_POST['edit_id']; 
  

    
        $query=$con->prepare("
            UPDATE admin SET
            username=:username,email=:email,password=:password
            WHERE id_admin=:id
        ");
        echo 'hello';
        $query->bindParam(":username",$username);
        $query->bindParam(":email",$email);
        $query->bindParam(":password",$password);
        $query->bindParam(":id",$id);

        if($query->execute()){

            $_SESSION['succes']="your Data is Updated";
            header('location:register.php');
        }
   else{

    $_SESSION['status']="your Data is  Updated";
    header('location:register.php');

   }

}


if(isset($_POST['delete_btn'])){

    $con = config::connect(); 

 $id=$_POST['delete_id'];
 $query=$con->prepare("DELETE  FROM admin WHERE id_admin=$id");



   
 if($query->execute()){

    $_SESSION['succes']="your Data is DELETED";
    header('location:register.php');
}
else{

$_SESSION['status']="your Data is NOT  DELETED";
header('location:register.php');

}

}

if(isset($_POST['login_btn'])){
    $con = config::connect();

    $email_login=$_POST['emaill'];
    $password_login=md5($_POST['passwordd']);
    $query=$con->prepare("SELECT * FROM admin WHERE email='$email_login' AND password= '$password_login'");
    $query->execute();
    

     if($query->rowCount()>0){
      
        $row=$query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username']=$row['email'];
        header('location:index.php');
        exit();
     }else{
        $_SESSION['status']='Email id / password is invalid';
        header('location:login.php');
     }
}



/*----------------------Recruteur <update></update>
<---------------------------------->*/



if(isset($_POST['updatebtn1'])){
    $con = config::connect(); 
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=md5($_POST['edit_password']);
    $id=$_POST['edit_id1']; 
  

    
        $query=$con->prepare("
            UPDATE recruters SET
            username=:username,email=:email,password=:password
            WHERE id=:id
        ");
      
        $query->bindParam(":username",$username);
        $query->bindParam(":email",$email);
        $query->bindParam(":password",$password);
        $query->bindParam(":id",$id);

        if($query->execute()){

            $_SESSION['succes1']="your Data is Updated";
            header('location:recruteur.php');
        }
   else{

    $_SESSION['status1']="your Data is Updated";
    header('location:recruteur.php');

   }

}

if(isset($_POST['delete_btn1'])){

    $con = config::connect(); 

 $id=$_POST['delete_id1'];
 $query=$con->prepare("DELETE  FROM recruters WHERE id=$id");



   
 if($query->execute()){

    $_SESSION['succes1']="your Data is DELETED";
    header('location:recruteur.php');
}
else{

$_SESSION['status1']="your Data is NOT  DELETED";
header('location:recruteur.php');

}

}

//-----------condidat-----------------

if(isset($_POST['updatebtn2'])){
    $con = config::connect(); 
    $username=$_POST['edit_username1'];
    $email=$_POST['edit_email1'];
    $password=md5($_POST['edit_password1']);
    $id=$_POST['edit_id2']; 
  

    
        $query=$con->prepare("
            UPDATE users SET
            username=:username,email=:email,password=:password
            WHERE id=:id
        ");
      
        $query->bindParam(":username",$username);
        $query->bindParam(":email",$email);
        $query->bindParam(":password",$password);
        $query->bindParam(":id",$id);

        if($query->execute()){

            $_SESSION['succes2']="your Data is Updated";
            header('location:candidat.php');
        }
   else{

    $_SESSION['status2']="your Data is Updated";
    header('location:candidat.php');

   }

}

if(isset($_POST['delete_btn2'])){

    $con = config::connect(); 

 $id=$_POST['delete_id2'];
 $query = $con->prepare("DELETE FROM users WHERE id = :id");
 $query->bindParam(':id', $id);


   
 if($query->execute()){
    echo 'hello';

    $_SESSION['succes2']="your Data is DELETED";
    header('location:candidat.php');
    exit();
}
else{

$_SESSION['status2']="your Data is NOT  DELETED";
header('location:candidat.php');

}

}

































































