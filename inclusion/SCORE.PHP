<?php

    function in_arrayi($needle, $haystack) {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }
    
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
            $requireformation=14;
            break;   
     case 3:
            $requireformation=24;
            break;
       case 4:
            $requireformation=36;
            break;
      default:
            $requireformation=-1;
            break;
    }
    $score=0;
    $fichier= __DIR__ . '\etude.csv';
    $etudes = array_map('str_getcsv', file("$fichier"));
    $etudes=$etudes[0];
    // print_r($etudes);
    $i=-1;
    foreach($etudes as $formation){
   $i++;
    if($i>=$requireformation){
     
   
    if (in_arrayi($formation, $dbf)) {
    if((0 <= $i) && ($i <= 1))
    {
    $score=5;
    }
    else if((2 <= $i) && ($i <= 13))
    {
        $score=15;
    
    }else if((14 <= $i) && ($i <= 21))
    {
        $score=25;
    
    }else if((22 <= $i) && ($i <= 23))
    {
        $score=30;
    
    }
    else if((24 <= $i) && ($i <= 33))
    {
        $score=35;

    }else if((34 <= $i) && ($i <= 35))
    {
        $score=40;
    
    }
    else if((36 <= $i) && ($i <= 37))
    {
        $score=50;
    
    }
    
    }   }
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
        "reqskill" =>$reqskill,
        "reql" =>$requireformation,
"formation"=>$dbf
      );
      // Encode the array data as a JSON string
      $scoring= json_encode($data);
return $scoring ;
    }
    ;
    
    // $fichier= __DIR__ . '\etude.csv';
    // $etudes = array_map('str_getcsv', file("$fichier"));
    // $etudes=$etudes[0];
    // print_r($etudes);