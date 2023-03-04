<?php

class config{


public static function connect(){
 
   $host="localhost";//
   $username="root";//the user to connect
   $password="";//the password of this user
   $dbname="hicham_project";


try{
  

  $con=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);// start a new coonetion with pdo
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);// bach tkhli attribute ymchi 3la nidam lexception

}catch(PDOEXCEPTION $e){
    echo "connection failed " .$e->getMessage();
   
}


return $con;
}


} 

















?>


