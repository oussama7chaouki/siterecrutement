<?php
//  function score($con,$user_id,$id_candidature): int {
// //  $user_id=70;
// //  $id_candidature=131;
// // $required=["p","gmail","c++","c","word","excel","marketing","access","microsoft office","r","pr","lan","international"];
// // $requireformation=0;
// // $requireexp=0;
// // include 'config.php';
// // $con = config::connect(); // The $i=0;
// $stmtf=$con->prepare("select formation from formations where user_id=$user_id");
// $stmte=$con->prepare("select startyear,endyear from experiences where user_id=$user_id");
// $stmts=$con->prepare("select skill from skills where user_id=$user_id");
// $stmtreqf=$con->prepare("select skillreq,expreq,formationreq from jobs where id_job in (select id_job from candidature where id_candidature=$id_candidature) ");
// $stmtf->execute();
// $stmte->execute();
// $stmts->execute();
// $stmtreqf->execute();
// $dbfs=$stmtf->fetchall(PDO::FETCH_ASSOC);
// $dbs=$stmts->fetchall(PDO::FETCH_ASSOC);
// $dbe=$stmte->fetchall(PDO::FETCH_ASSOC);
//  $requiresk=$stmtreqf->fetch(PDO::FETCH_ASSOC);
//  $requireformation=$requiresk['formationreq'];
//  $requireexp=$requiresk['expreq'];
//  $required=$requiresk['skillreq'];
//  $required=explode(",", $required);
// $dbf=[];
// foreach($dbfs as $f){
//     array_push($dbf,$f['formation']);
// }
// //  print_r($dbf);
//  $dbs=$dbs[0]["skill"];
//  $dbs=explode(",", $dbs);
// //  print_r($dbs);

// //  print_r($required);
// //  //print_r($dbs);
// //  print_r($requiresk);
// $score=0;

// $fichier= __DIR__ . '\etude.csv';
// $etudes = array_map('str_getcsv', file("$fichier"));
// $etudes=$etudes[0];
// // print_r($etudes);
// $i=0;
// foreach($etudes as $formation){
// $i++;
// if($i<$requireformation){
//     continue;
    
// }
// if (in_array($formation, $dbf)) {
// if((0 <= $i) && ($i <= 1))
// {
// $score=5;
// }
// else if((2 <= $i) && ($i <= 14))
// {
//     $score=15;

// }else if((15 <= $i) && ($i <= 23))
// {
//     $score=25;

// }else if((24 <= $i) && ($i <= 25))
// {
//     $score=30;

// }
// else if((26 <= $i) && ($i <= 36))
// {
//     $score=35;

// }else if((37 <= $i) && ($i <= 38))
// {
//     $score=40;

// }
// else if((39 <= $i) && ($i <= 40))
// {
//     $score=50;

// }

// } 
// }

// foreach ($dbs as &$value) {
//     $value = trim($value);
//   }

// $common_values = array_intersect($required, $dbs);

// $score+=count($common_values);
// // echo count($common_values).",iujjuuh";
// // print_r($dbs);
// // print_r($required);
// $month=0;
// $months=0;
// $sc=0;
// foreach($dbe as $exp){
//     $startyear=$exp['startyear'];
//     $endyear=$exp['endyear'];
//     // echo $startyear;
//     // echo $endyear;
//     // $month=$startyear-$endyear;
//     $date1 = new DateTime($startyear);
// $date2 = new DateTime($endyear);
// $interval = $date1->diff($date2);
// $month= $interval->format('%a'); // Output: 2 months
// $month=floor($month/30);
// //  echo $month."<br>";
//     $sc+=$month*0.5;
//     $months+=$month;
// }
// // echo $months;
// if($months>=$requireexp){
//     $score+=$sc;
// }
// return $score;

// }    //  $user_id=70;
    //  $id_candidature=131;
    // $required=["p","gmail","c++","c","word","excel","marketing","access","microsoft office","r","pr","lan","international"];
    // $requireformation=0;
    // $requireexp=0;
    // include 'config.php';
    // $con = config::connect(); // The $i=0;
function scores($con,$user_id,$id_job) {

    $stmtf=$con->prepare("select formation from formations where user_id=$user_id");
    $stmte=$con->prepare("select startyear,endyear from experiences where user_id=$user_id");
    $stmts=$con->prepare("select skill from skills where user_id=$user_id");
    $stmtreqf=$con->prepare("select skillreq,expreq,formationreq from jobs where id_job=$id_job");
    $stmtf->execute();
    $stmte->execute();
    $stmts->execute();
    $stmtreqf->execute();
    $dbfs=$stmtf->fetchall(PDO::FETCH_ASSOC);
    $dbs=$stmts->fetchall(PDO::FETCH_ASSOC);
    $dbe=$stmte->fetchall(PDO::FETCH_ASSOC);
     $requiresk=$stmtreqf->fetch(PDO::FETCH_ASSOC);
     
     $requireexp=$requiresk['expreq'];
     $required=$requiresk['skillreq'];
     $required=explode(",", $required);
    $dbf=[];
    $reqfor="false";
$reqexp="false";
$reqskill=0;
    foreach($dbfs as $f){
        array_push($dbf,$f['formation']);
    }
    //  print_r($dbf);
     $dbs=$dbs[0]["skill"];
     $dbs=explode(",", $dbs);
    //  print_r($dbs);
    
    //  print_r($required);
    //  //print_r($dbs);
    //  print_r($requiresk);
    switch ($requiresk['formationreq']) {
        case 0:
            $requireformation=0;
                        break;
        case 1:
            $requireformation=2;
                        break;
        case 2:
            $requireformation=15;
            break;   
                 case 3:
            $requireformation=26;
            break;
                    case 4:
            $requireformation=38;
            break;

    }

    $score=0;
    $fichier= __DIR__ . '\etude.csv';
    $etudes = array_map('str_getcsv', file("$fichier"));
    $etudes=$etudes[0];
    // print_r($etudes);
    $i=0;
    foreach($etudes as $formation){
    $i++;
    if($i<$requireformation){
        continue;
        
    }
    if (in_array($formation, $dbf)) {
    if((0 <= $i) && ($i <= 1))
    {
    $score=5;
    }
    else if((2 <= $i) && ($i <= 14))
    {
        $score=15;
    
    }else if((15 <= $i) && ($i <= 23))
    {
        $score=25;
    
    }else if((24 <= $i) && ($i <= 25))
    {
        $score=30;
    
    }
    else if((26 <= $i) && ($i <= 36))
    {
        $score=35;
    
    }else if((37 <= $i) && ($i <= 37))
    {
        $score=40;
    
    }
    else if((38 <= $i) && ($i <= 39))
    {
        $score=50;
    
    }
    
    } 
    }
    if($score!=0){
        $reqfor="true";
    }
    foreach ($dbs as &$value) {
        $value = trim($value);
      }
    
    $common_values = array_intersect($required, $dbs);
    $reqskill=ceil((count($common_values)/count($required))*100);
    $score+=count($common_values);
    // echo count($common_values).",iujjuuh";
    // print_r($dbs);
    // print_r($required);
    $month=0;
    $months=0;
    $sc=0;
    foreach($dbe as $exp){
        $startyear=$exp['startyear'];
        $endyear=$exp['endyear'];
        // echo $startyear;
        // echo $endyear;
        // $month=$startyear-$endyear;
        $date1 = new DateTime($startyear);
    $date2 = new DateTime($endyear);
    $interval = $date1->diff($date2);
    $month= $interval->format('%a'); // Output: 2 months
    $month=floor($month/30);
    //  echo $month."<br>";
        $sc+=$month*0.5;
        $months+=$month;
    }
    // echo $months;
    if($months>=$requireexp){
        $score+=$sc;
        $reqexp="true";
    }
    if($score>100){
        $score=100;
    }
    $data= array(
        "score" => ceil($score),
        "reqexp" => "$reqexp",
        "reqfor" => "$reqfor",
        "reqskill" =>$reqskill
      );
      // Encode the array data as a JSON string
      $scoring= json_encode($data);
return $scoring ;
    }
    ;
    
