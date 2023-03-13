<?php
session_start();

include_once("config.php"); // function class

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hicham1.css">
    <script src="https://kit.fontawesome.com/31a9ea36c8.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
 
<!-- <?php  include "sidebar.php"?> -->
<section>
<div class="main">

<div class="Up  border shadow p-4 rounded green-line" style="width: 700px;margin-bottom: 40px;
;"  >

<h2 style="font-size:22px;" class="text-muted"><?php echo $_SESSION['nom']?> <?php echo $_SESSION['prenom'];?>&#x1F1F2;&#x1F1E6;<span style="font-size:15.5px">(<?php
    
    
  $current_date = date('Y-m-d');
 $dob = $_SESSION['date']; // Replace with the actual date of birth
 $dob_timestamp = strtotime($dob);
 $age = floor((time() - $dob_timestamp) / 31536000);
 echo $age ."ans" ;
  ?> habite à <?php echo $_SESSION['ville'];?> )</span>
  
  </h2>

</div>

  <ul class="tabs">

 <li class="active1" data-cont=".one"> <i style="padding-right: 4px; font-size: 14px;"  class="fa fa-user-circle"></i>Informations personnelles</li>
 <li data-cont=".two"><i class="fa fa-key"></i> change password</li>
 
 </ul>

 <div   class="content" >


<div  style="width: 700px;"   class="one  border shadow p-4 rounded">
 

      <div class="container">
        <form action="process.php" method="post" id="myform" >
          
          <hr class="my-4 blue-line">
      
          <div class="mb-2" >
            
            <label for="genre" class="form-label text-muted" >Genre <span class="text-danger">*</span></label>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="genre"  value="male">
      
            <label class="form-check-label text-muted" for="male" >
              Homme  </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="" name="genre" value="female">
              <label class="form-check-label text-muted" for="male" >
               Femme </label>
            </div>
            
          </div>
          <br>
          
          <div class="mb-2 ">
            
            <label for="nom" class="form-label text-muted">Nom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="nom"  name="nom" value="<?= $_SESSION['nom']?>">
            <span id="span1"></span>
          </div>
          <br>
          
          <div class="mb-1">
            <label for="prenom" class="form-label text-muted">Prenom <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $_SESSION['prenom']?>">
            <span id="span2"></span>
          </div>
       <br>
          <div class="mb-1">
            <label for="date" class="form-label text-muted">Date de naissance <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="date" name="date" value="<?= $_SESSION['date']?>">
            <span id="span5"></span>
          </div>
          <br>
          <div class="mb-1">
            <label for="text" class="form-label text-muted">Ville <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="ville" name="ville" value="<?= $_SESSION['ville']?>">
            <span id="span4"></span>
          </div>
          <br>
          <div class="mb-1">
            <label for="tel" class="form-label text-muted" >phone number <span class="text-danger">*</span></label>
           
            <input type="tel" class="form-control"  name="tel" id="tel" placeholder="&#x1F1F2;&#x1F1E6;+212" value="<?= $_SESSION['tel']?>">
            <span id="span3"></span>
      
          </div>
          <br>
          
        
          <hr class="my-4 blue-line">
          <button  style="background-color: #338573; border:2px solid #338573;" type="submit" class="btn btn-primary" name="confirmer1" id="suivant" >confirmer</button>
        
       
          
        </form>
      </div>
  
  </div>
  <div  style="width: 700px;"   class="two  border shadow p-4 rounded">



  

      <div class="container ">
        <form  action="changepass.php" method="post" id="myform">
         
          <hr class="my-4 blue-line">
      
          
          
          <div class="mb-1 ">
            
            
            <label for="nom" class="form-label text-muted">Ancien mot de pass <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="nom"  name="op">
            <span id="span1"></span>
          </div>
          <br>
          
          <div class="mb-1">
            <label for="prenom" class="form-label text-muted">nouveau mot pass<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="prenom" name="np" >
            <span id="span2"></span>
          </div>
          <br>
          <div class="mb-1">
            <label for="prenom" class="form-label text-muted"> confirmer nouveau mot pass<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="prenom" name="c_np" >
            <span id="span2"></span>
          </div>
          <br>
          
        
          <hr class="my-4 blue-line">
          <button  style="background-color: #338573; border:2px solid #338573;" type="submit" class="btn btn-primary" name="confirmer2" id="suivant" >confirmer</button>
        
        </form>
      
      </div>
</section>




</div>


 














</div>
  </div>
  


<script src="myScript.js"> </script>

<script src="verify.js"> </script>



</body>
</html>



















