
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/31a9ea36c8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="hicham2.css">
    <title>Document</title>
</head>
<body>
<?php


include 'sidebarrec.php'
?>
<section>

<div class="container green-line">
  <form class="border shadow p-3 rounded"  action="process1.php" method="post" id="myform" 
  >
    <h4 class="text-muted"> <i style="padding-right: 4px; font-size: 20px;"  class="fa fa-user-circle"></i>Informations personnelles</h4>
    <hr class="my-4 blue-line">

   
       
    <div class="mb-2 ">
      
      <label for="nom" class="form-label text-muted">Company name <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="companynom"  name="companynom">
      <span id="span1"></span>
    </div><br>
    <br>
    <div class="mb-2 ">

      <label for="nom" class="form-label text-muted">Contact Person name <span class="text-danger">*</span></label>
      <input type="text"  class="form-control" id="nom"  name="Contact_Person_name">
      <span id="span2"></span>
    </div>
    
    <div class="mb-1">
      <label for="prenom" class="form-label text-muted">Contact Person email <span class="text-danger">*</span></label>
      <input type="email" class="form-control" id="email" name="Contact_Person_email" >
      <span id="span3"></span>
    </div>

    <div class="mb-1">
      <label for="date" class="form-label text-muted"  >Contact Person phone number <span class="text-danger">*</span></label>
      <input type="text" class="form-control"  placeholder="&#x1F1F2;&#x1F1E6;+212"  id="tel" name="Contact_Person_phone_number" >
      <span id="span4"></span>
    </div>
    <div class="mb-1">
    <label for="tel" class="form-label text-muted" >Address:<span class="text-danger">*</span></label>
    <input type="adress" class="form-control" id="address" name="Address">
      <span id="span5"></span>
    </div>

    
    <br>
    <hr class="my-4 blue-line">
    <button type="submit" class="btn btn-primary" name="Confirmer" id="suivant" >Confirmer</button>
  
    
  </form>

</div>
</section>
<script src="company.js"></script>





</body>
</html>




