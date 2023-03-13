<?php
require('work.php');

$stmt = $con->prepare("
SELECT * FROM skills WHERE user_id=$user_id");
$stmt->execute();
$count = $stmt->rowCount();
if($count<1){
  $query = "INSERT INTO skills(user_id,skill) VALUES(:user_id,:skill)";
$statement = $con->prepare($query);
}
else{
  $query = "update skills set skill=:skill where user_id=:user_id";
  $statement = $con->prepare($query);
}

$siko= array();

$pattern_array = array_map('str_getcsv', file('data\skill.csv'));
$pattern_array=$pattern_array[0];

// print_r($pattern_array);
foreach ($pattern_array as $pattern)
{

  if(preg_match("/\b$pattern\b/i", $textContent))
  {
    $pattern=str_replace("\s*","", $pattern);
    array_push($siko,$pattern);
  } 
}
$sikosize=count($siko);
if($sikosize>=1){
  $sikos=implode(",", $siko);
$statement->execute(
 array(
   ':user_id'=>$user_id,
  ':skill' => $sikos
 )
);
}