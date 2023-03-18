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
    
 
 <?php  include "sidebarrec.php"?> 
<section>
<div class="main">

<div class="Up  border shadow p-4 rounded green-line" style="width: 700px;height: 100px;;margin-bottom: 40px;
;"  >



</div>

  <ul class="tabs">

 <li class="active1" data-cont=".one"> <i style="padding-right: 4px; font-size: 14px;"  class="fa fa-user-circle"></i>Informations personnelles</li>
 <li data-cont=".two"><i class="fa fa-key"></i> change password</li>
 
 </ul>

 <div   class="content" >


<div  style="width: 700px;height: 850px;"   class="one  border shadow p-4 rounded">
 

      <div class="container">
        <form action="process1.php" method="post" id="myform" >
          
          <hr class="my-4 blue-line">
      
          <div class="mb-2 ">
      
      <label for="nom" class="form-label text-muted">Company name <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="companynom"  value="<?php echo $_SESSION['name']?> "  name="companynom">
      <span id="span1"></span>
    </div><br>
    <br>
    <div class="mb-2 ">

      <label for="nom" class="form-label text-muted">Contact Person name <span class="text-danger">*</span></label>
      <input type="text"  class="form-control" id="nom"  name="Contact_Person_name" value="<?php echo  $_SESSION['person_name']?> ">
      <span id="span2"></span>
    </div>
    
    <div class="mb-1">
      <label for="prenom" class="form-label text-muted">Contact Person email <span class="text-danger">*</span></label>
      <input type="email" class="form-control" id="email" name="Contact_Person_email"  value="<?php echo  $_SESSION['person_email']?>">
      <span id="span3"></span>
    </div>

    <div class="mb-1">
      <label for="date" class="form-label text-muted"  >Contact Person phone number <span class="text-danger">*</span></label>
      <input type="text" class="form-control"  placeholder="&#x1F1F2;&#x1F1E6;+212"  id="tel" name="Contact_Person_phone_number"  value="<?php echo  $_SESSION['tel']?>">
      <span id="span4"></span>
    </div>
    <div class="mb-1">
    <label for="tel" class="form-label text-muted" >Address:<span class="text-danger">*</span></label>
    <input type="adress" class="form-control" id="address" name="address" value="<?php echo  $_SESSION['address']?>">
      <span id="span5"></span>
    </div>

          <br>
          
        
          <hr class="my-4 blue-line">
          <button  style="float: right;background-color: #338573; border:2px solid #338573;" type="submit" class="btn btn-primary" name="confirmer4" id="suivant" >confirmer</button>
        
       
          
        </form>
      </div>
  
  </div>
  <div  style="width: 700px;height: 500px;"   class="two  border shadow p-4 rounded">



  

      <div class="container ">
        <form  action="changepassrec.php" method="post" id="myform">
         
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
          <button  style="float: right;background-color: #338573; border:2px solid #338573;" type="submit" class="btn btn-primary" name="confirmer4" id="suivant" >confirmer</button>
        
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



















