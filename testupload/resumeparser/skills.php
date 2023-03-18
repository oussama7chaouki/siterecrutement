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
$stmtlangue = $con->prepare("
SELECT * FROM languages WHERE user_id=$user_id");
$stmtlangue->execute();
$count = $stmtlangue->rowCount();
if($count<1){
  $queryl = "INSERT INTO languages(user_id,language) VALUES(:user_id,:language)";
$statementl = $con->prepare($queryl);
}
else{
  $queryl = "update languages set language=:language where user_id=:user_id";
  $statementl = $con->prepare($queryl);
}
$ligo=array();
$siko= array();

$pattern_array = array_map('str_getcsv', file('data\skill.csv'));
$pattern_array=$pattern_array[0];
$pattern_array1 = array_map('str_getcsv', file('data\modlanguage.csv'));
$pattern_array1=$pattern_array1[0];

// print_r($pattern_array);
foreach ($pattern_array as $pattern)
{

  if(preg_match("/\b$pattern\b/i", $textContent))
  {
    $pattern=str_replace("\s*","", $pattern);
    array_push($siko,$pattern);
  } 
}
foreach ($pattern_array1 as $pattern1)
{

  if(preg_match("/\b$pattern1\b/i", $textContent))
  {
    $pattern1=str_replace("\s*","", $pattern1);
    array_push($ligo,$pattern1);
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
$ligosize=count($ligo);
if($ligosize>=1){
  $ligos=implode(",", $ligo);
$statementl->execute(
 array(
   ':user_id'=>$user_id,
  ':language' => $ligos
 )
);
}