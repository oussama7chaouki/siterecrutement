<?php
//insert.php
//insert.php
// require '../dbcon1.php';
// $con = config::connect(); // The :: notation is used to call a static method on a class
require('../userid.php');
if(isset($_POST["language"]))
{
   $querytest="select count(*) from languages where user_id=:user_id";
    $statement1 = $con->prepare($querytest);
 $statement1->execute( 
    array(
    ':user_id'=>$user_id)
 );
 $number_of_rows = $statement1->fetchColumn(); 

    if( $number_of_rows>=1){
        $query = "UPDATE languages SET language=:language where user_id=:user_id";
        $statement = $con->prepare($query);
        $statement->execute(
         array(
            ':user_id'=>$user_id,
          ':language' => $_POST["language"]
         )
        );
        $result = $statement->fetchAll();
    }
    else{
         $query = "INSERT INTO languages(user_id,language) VALUES(:user_id,:language)";
 $statement = $con->prepare($query);
 $statement->execute(
  array(
    ':user_id'=>$user_id,
   ':language' => $_POST["language"]
  )
 );
 $result = $statement->fetchAll();
    }

 $output = '';
 if(isset($result))
 {
  $output = '
   Your data has been successfully saved into System
  ';
 }
 echo $output;
}

?>

