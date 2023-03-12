<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../header.css">
    <!-- <link rel="stylesheet" href="offcanva.css"> -->
</head>
<body>




<?php
  include '../sidebar.php';
  ?>
  <section >
  <header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
   <li class="nav-item">
      <!-- <a href=""> <?php // echo 'hello ' .$_SESSION['username']; 
                        ?></a> -->
      <a href="../logoutrec.php">
         <button type="button" class="btn btn-rounded mx-2 ripple-surface" style="background-color: #338573; color: white">LOGOUT</button>
      </a>
   </li>

</nav>

</header>
<?php 
require 'APPLICATION\userid.php';
 $stmt = $con->query("SELECT * FROM `jobs` WHERE `recruter_id`=$recruter_id");
 // $stmt->bindParam(":recruter_id",$recruter_id);
 $stmt->execute();
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
     foreach($data as $job)
     {
      $id_job=$job['id_job'];
      $stmt1 = $con->query("SELECT count(*) FROM `candidature` WHERE `id_job`=$id_job");
      // $stmt->bindParam(":recruter_id",$recruter_id);
      $stmt1->execute();
      $count = $stmt1->fetchColumn();
?>
<div class="card mx-auto mt-5" style="width:70%" >
  <div class="card-header">
  <?=$job['date']?>
</div>
  <div class="card-body">
    <h5 class="card-title"><?=$job['job_title']?> / <?=$job['domain']?></h5>
    <p class="card-text" style="font-size: 0.8em;">  <img src="../image\candidate (4).png" alt="applicant"> <?=$count?> APPLICANT</p>
    <a href="APPLICATION\index.php?id_job=<?=$id_job?>" class="btn btn-primary" >See candidate</a>
  </div>
</div>
<?php
                                }
                            ?>
                            </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>