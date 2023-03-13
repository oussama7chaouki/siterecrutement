<?php
require('education.php');
$do=8;
// $postjobs = array_map('str_getcsv', file('etude.csv'));
// $postjobs=$postjobs[0];
$n=0;
$textContent2=$textContent;
$query = $con->prepare(" 
INSERT INTO experiences (experience, company, startyear,endyear,user_id)
                         VALUES (:experience, :company,:startyear,:endyear,:user_id)
                         ");
                        //  $query->bindParam(":experience",$experience);
                        //  $query->bindParam(":company",$company);
                         $query->bindParam(":user_id",$user_id);

//echo "<br>".$p."<br>";
      //get jobs with their domain 
      $jobs = array_map('str_getcsv', file('data\modconjob.csv'));
    //  //print_r($jobspost);
    //   $domains = array_map('str_getcsv', file('data\domain.csv'));
    //   // print_r($domains);
    //   $jobs= array_combine($domains[0],$jobspost);
    //   // print_r( $jobs[$domains[0][8]]) ;
    // $pattern="/((J\s*a\s*n\s*v\s*(i\s*e\s*r)?|F\s*(e|é)\s*v\s*r\s*(i\s*e\s*r)?|M\s*a\s*r\s*s|A\s*v\s*r\s*(i\s*l)?|M\s*a\s*i|J\s*u\s*i\s*n|j\s*u\s*i\s*l\s*l\s*(e\s*t)?|A\s*o\s*(u|û)\s*t|S\s*e\s*p\s*t\s*(e\s*m\s*b\s*r\s*e)?|O\s*c\s*t\s*(o\s*b\s*r\s*e)?|N\s*o\s*v\s*(e\s*m\s*b\s*r\s*e)?|D\s*(e|é)\s*c\s*(e\s*m\s*b\s*r\s*e)?)\s*)?(2\s*0|1\s*9)\s*\d\s*\d\s*((a|à)|(j\s*u\s*s\s*q\s*u\s*'\s*(a|à)))?\s*((J\s*a\s*n\s*v\s*(i\s*e\s*r)?|F\s*(e|é)\s*v\s*(r\s*i\s*e\s*r)?|M\s*a\s*r\s*s|A\s*v\s*r\s*(i\s*l)?|M\s*a\s*i|J\s*u\s*i\s*n|j\s*u\s*i\s*l\s*l\s*(e\s*t)?|A\s*o\s*(u|û)\s*t|s\s*e\s*p\s*t\s*(e\s*m\s*b\s*r\s*e)?|O\s*c\s*t\s*(o\s*b\s*r\s*e)?|N\s*o\s*v\s*(e\s*m\s*b\s*r\s*e)?|D\s*(e|é)\s*c\s*(e\s*m\s*b\s*r\s*e)?))?\s*(2\s*0|1\s*9)\s*\d\s*\d/i";

    if( preg_match_all( $pattern, $textContent2, $matchees,PREG_OFFSET_CAPTURE)){
        for($i=0;$i<count(($matchees[0]));$i++){
          
            if($i==count(($matchees[0]))-1){
                $text=substr($textContent2, $matchees[0][$i][1]);
                $start=$matchees[0][$i][1];
                if($matchees[0][$i][1]>73){$start=$matchees[0][$i][1]-50;}
                $posttext=substr($textContent2, $start);
              }
            else{

            $text=substr($textContent2, $matchees[0][$i][1],$matchees[0][$i+1][1]-$matchees[0][$i][1]);
            $start=$matchees[0][$i][1];
            if($matchees[0][$i][1]>73){$start=$matchees[0][$i][1]-46;}
            $posttext=substr($textContent2, $start,$matchees[0][$i+1][1]-$start-33);
          }
          // echo "<br>".$textContent2."<br>";

      // echo "<br>".$text."<br>";
      // echo "<br>".$posttext."<br>";
       // $hellpme=$matchees[0][$i][1];
       // if($matchees[0][$i][1]>73){$hellpme=$matchees[0][$i][1]-50;}
        foreach ($miko as $miiko){  
       if(($matchees[0][$i][1])==$miiko){
 
         break 2;
       }}
      if(preg_match_all('/(\d\s*\d\s*\d\s*\d\s*)/i',$matchees[0][$i][0],$matchi)) {
               $startyear1=str_replace(" ","",$matchi[0][0]);
      //  echo "start:".$startyear1;
      if ($matchi[0][1]) {
       $endyear1=str_replace(" ","",$matchi[0][1]);
        // echo "end:".$endyear1;
       }
       else{
        $endyear1="2023";
       }
      }
  //  echo "start:".$startyear1;
  //                   echo "end:".$endyear1;
  // echo "<br>".$posttext."<br>";
  // echo "<br>".$text."<br>";

                    $query->bindParam(":startyear",$startyear1);
                    $query->bindParam(":endyear",$endyear1);
                 $company='/(S\s*O\s*C\s*I\s*(E|É)\s*T\s*(E|é)|s\s*o\s*c\s*i\s*(e|é)\s*t\s*(e|é)|S\s*o\s*c\s*i\s*(e|é)\s*t\s*(e|é)|G\s*r\s*o\s*u\s*p\s*e\s*)?\b[A-Z]{2,}\b\s*(\b[A-Z]+\b\s*)*/';        
                 foreach($jobs[0] as $postjob){
                  if($left!=true){
                   if(preg_match("/\b$postjob\b/i",$posttext)){
                    $tiko=false;
                            if(preg_match($company,$posttext,$matio,PREG_OFFSET_CAPTURE))  {
                              foreach ($micho as $miicho){  
                                if($miicho==$matio[0][1]+$matchees[0][$i][1]){
                                  $tiko=true;
                                  break;
                                }}
                                if($tiko==true){
                                  preg_match_all($company,$posttext,$matiao,PREG_OFFSET_CAPTURE);
                                  $com=$matiao[0][1][0];
                                  $micho[$n]=$matiao[0][1][1]+$matchees[0][$i][1];
                                  $n++;
                                }
                               if($tiko!=true){
                               $com=$matio[0][0];
                               $micho[$n]=$matio[0][1]+$matchees[0][$i][1];
                               $n++;
                                    }
                                  }
                                  // print_r($micho);

                          $postjob=str_replace("\s*","", $postjob);
                          // echo $postjob;
                          // echo $com.'<br> <br>';
                          $query->bindParam(":experience",$postjob);
                          $query->bindParam(":company",$com);
                          $right=true;
                          try {
                            $query->execute();
                        } catch(PDOException $e) {
                            // handle the error here, for example log it or display a user-friendly message
                            echo "Error: " . $e->getMessage();
                            return false;
                        }
                          break;
                        }
                      }

                        }
                        if($right!=true){
                          foreach($jobs[0] as $postjob){
                            if(preg_match("/\b$postjob\b/i",$text)){
                              //  echo "<br>".$text."<br>";
                              $tiko=false;
                              if(preg_match($company,$text,$matio,PREG_OFFSET_CAPTURE))  {
                                foreach ($micho as $miicho){  
                                  if($miicho==$matio[0][1]+$start){
                                    $tiko=true;
                                    break;
                                  }}
                                  if($tiko==true){
                                    preg_match_all($company,$posttext,$matiao,PREG_OFFSET_CAPTURE);
                                    print_r($matiao);
                                    $com=$matiao[0][1][0];
                                    $micho[$n]=$matiao[0][1][1]+$start;
                                    $n++;
                                  }
                                 else if($tiko!=true){
                                 $com=$matio[0][0];
                                 $micho[$n]=$matio[0][1]+$start;
                                 $n++;
                                      }}
// print_r($micho);
                            $postjob=str_replace("\s*","", $postjob);
                            // echo $postjob;
                            // echo "<br>".$matchees[0][$i][0]."<br>";
                            // echo $com.'<br> <br>';
                            $com==preg_replace("\s*","\s",$com);
                            $query->bindParam(":experience",$postjob);
                          $query->bindParam(":company",$com);
                           $left=true;
                          try {
                            $query->execute();
                        } catch(PDOException $e) {
                            // handle the error here, for example log it or display a user-friendly message
                            echo "Error: " . $e->getMessage();
                            return false;
                        }
                            break;
                          }
                        }
                      }
                 } 
                }
//       $text=substr($textContent2, $matchees[0][1]);
//         foreach($matchees as $working){

//     echo "<br>".$matchees[0][0]."<br>";
//      $company='/(S\s*O\s*C\s*I\s*(E|É)\s*T\s*E|s\s*o\s*c\s*i\s*(e|é)\s*t\s*e|S\s*o\s*c\s*i\s*(e|é)\s*t\s*e|G\s*r\s*o\s*u\s*p\s*e)?\s*\w*\s*\w*\s*\b[A-Z]+\b\s*(\b[A-Z]+\b\s*)*/';
//      //echo "<br>".$text."<br>"; 
//    if(preg_match($company,$text,$matio,PREG_OFFSET_CAPTURE))  {
//     echo $matio[0][0];
//     $text=substr($text, $matio[0][1]+strlen($matio[0][0]));

 //print_r($matchees);
 

// }
// }

//  print_r($matchees);
?>