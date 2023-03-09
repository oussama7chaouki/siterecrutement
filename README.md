# hicham
 if( isset($_FILES['photo']) && $_FILES['photo']['error']==0){
    $allowed = array("txt","doc","PDF","pdf");
    $filename = $_FILES['photo']['name'];
    $filesize = $_FILES['photo']['size'];
    $filetype = $_FILES['photo']['type'];
    $fileext = pathinfo($filename,PATHINFO_EXTENSION);

if(!in_array($fileext,$allowed)) die("error:NO");
if($filesize > $allowed) die("error:NO");
if(in_array($fileext,$allowed)){
  if(file_exists("dossier/".$filename)){
    echo "exists";
  }
  else{
    move_uploaded_file($_FILES['photo']['tmp_name'],"dossier/".$filename);
    echo "mahzoz ana";
  }
}




  }
  $cv="dossier/".$filename;
  
  
  
        <label for="cv">upload cv</label>
             <input type="file" value="upload cv" id="cv"  name="photo" >
