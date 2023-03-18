<?php
require('pdftotxt.php');
$query = $con->prepare(" 
    INSERT INTO formations (formation, school, startyear,endyear,user_id)
                             VALUES (:formation, :school, :startyear,:endyear,:user_id)
                             ");
                             $query->bindParam(":user_id",$user_id);

$ecoles = array_map('str_getcsv', file('data\modecole.csv'));
$ecoles=$ecoles[0];
$lycee='/l\s*y\s*c\s*(é|e)\s*e\s*\b[A-Z]+[a-z]*\b\s*(\b[A-Z]+[a-z]*\b)*/i';
$school='/f\s*a\s*c\s*u\s*l\s*t\s*(é|e)\s*(d\s*e|d\s*\')\s*(\s*\w*\s*){5}|(e\s*c\s*o\s*l\s*e\s*(\s*\w*\s*){5})|(i\s*n\s*s\s*t\s*u\s*t\s*e\s*(\s*\w*\s*){5})|(U\s*N\s*I\s*V\s*E\s*R\s*S\s*I\s*T\s*É\s*(\s*\w*\s*\W){5})/i';
$faculte= '/f\s*a\s*c\s*u\s*l\s*t\s*(é|e)\s*(d\s*e|d\s*\')\s*(\s*\w*\s*){5}/i';
//$lyfa='/(l\s*y\s*c\s*(é|e)\s*e\s*\b[A-Z]+[a-z]*\b\s*(\b[A-Z]+[a-z]*\b)*)|f\s*a\s*c\s*u\s*l\s*t\s*(é|e)\s*(d\s*e|d\s*\')\s*(\s*\w*\s*){5}/i';
$etudes = array_map('str_getcsv', file('data\modetude.csv'));
$etudes=$etudes[0];
$textContent1=$textContent;
$trois=0;
$e=0;
$i=0;
foreach ($etudes as $etude)
{
  //stripos($textContent,$etude
  if (preg_match("/\b$etude\b/i", $textContent1,$mat, PREG_OFFSET_CAPTURE))
  {
    $schollou="";
     $startyea=NULL;
    $endyear=NULL;
   
    $etude=str_replace("\s*","", $etude);
    $etude=str_replace("(ô|o)","o", $etude);
    $etude=str_replace("(é|e)","e",$etude);
  //  echo $etude." ";
  $parts = explode("|", $etude);
$etude = $parts[0];


   $texttest=substr($textContent1, $mat[0][1]-33,200);
   //echo $texttest."<br>";
   // The PREG_OFFSET_CAPTURE flag tells preg_match() to include the position of each match in the array
  //  if($mat[0][1]>25){  $text=substr($textContent1, $mat[0][1]-25,200); }
  //  else{  
    // if( preg_match( $pattern, $texttest)){
    //     if($e==0){   
    //     $trois=33;
    
    //   }
    // }$e++;
  //}
  $text=substr($textContent1, $mat[0][1]-$trois,200); 

//  echo "<br>".$text." \n end end end"."<br>";
   if ($etude=="Bac"|$etude=="Baccalaureat"){
    if(preg_match($lycee,$text,$scholl)){
        // echo $scholl[0];
        $schollou=$scholl[0];
    }
   }
   else{
if(preg_match($school,$text,$scholl)){
  $schollou=$scholl[0];
}
else {
  foreach ($ecoles as $ecole)
{ 
 
  if (preg_match("/\b$ecole\b/i", $text,$eco))
  {
    $schollou=$eco[0];
  break;
  }
}
}
}
if( preg_match( $pattern, $text, $matches,PREG_OFFSET_CAPTURE)){
  $miko[$i]=$matches[0][1]+$mat[0][1];
  if($mat[0][1]>25){  $miko[$i]-=25; }
 $i++;
      preg_match_all('/(\d\s*\d\s*\d\s*\d\s*)/i',$matches[0][0],$match);
      $startyear=str_replace(" ","",$match[0][0]);
    //  echo "start:".$startyear;
     if ($match[0][1]) {
      $endyear=str_replace(" ","",$match[0][1]);
      // echo "end:".$endyear;
      }
      else{
        echo "end:2023";
      }

   }
  //  echo $etude;
  //  echo "<br>";
  //  echo $schollou;
  //  echo "<br>";
  //  echo $startyear;
  //  echo "<br>";
  //  echo $endyear;
  //  echo "<br>";
      $query->bindParam(":formation",$etude);
   $query->bindParam(":school",$schollou);
   $query->bindParam(":startyear",$startyear);
   $query->bindParam(":endyear",$endyear); 
   try {
    $query->execute();
} catch(PDOException $e) {
    // handle the error here, for example log it or display a user-friendly message
    echo "Error: " . $e->getMessage();
    return false;
}
   } 
   

 }
 
//echo $textContent1;
  //print_r($miko);
  ?>