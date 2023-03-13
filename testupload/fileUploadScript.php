<?php
// session_start();
   echo 'WTF';
    // print_r($_FILES);
require "../user_id.php";

    if( isset($_FILES['photo']) && $_FILES['photo']['error']==0){
      echo 'WTTF';

       $allowed = array("txt","doc","PDF","pdf");
        $filename = $_FILES['photo']['name'];
         $filesize = $_FILES['photo']['size']; 
         $filetype = $_FILES['photo']['type']; 
         $fileext = pathinfo($filename,PATHINFO_EXTENSION);
         $maxSize = 10485760; 
      if(!in_array($fileext,$allowed)) {
      header('Location: index.php?error=PLEASE Enter a PDF,DOC,DoCX!');
      exit;}
            if($filesize > $maxSize){
            header('Location: index.php?error=file should be less than 10MB');
            exit;}
                   if(in_array($fileext,$allowed)){ 
         $cvname=$username.".".$fileext;
         // if(file_exists("dossier/".$filename)){ echo "exists"; } 
         move_uploaded_file($_FILES['photo']['tmp_name'],"dossier/".$cvname); echo "mahzoz ana";
            $_SESSION['cv']=$cvname;
            $cv="dossier/".$cvname;
            $query=$con->prepare("update information set cv='$cv' where user_id=$user_id");
            try {
               $query->execute();
               header('Location: resumeparser\index.php');
               exit;
           } catch(PDOException $e) {

               echo $e->getMessage();
           }

        }


    }
?> 