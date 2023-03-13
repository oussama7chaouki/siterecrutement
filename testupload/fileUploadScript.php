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

      if(!in_array($fileext,$allowed)) 
      die("error:NO"); 
      if($filesize > $allowed)
       die("error:NO"); 
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