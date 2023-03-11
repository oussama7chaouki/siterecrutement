
<?php

session_start();

$domain="informatique";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Card Inspirations (#5)</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../header.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php 
include'../sidebar.php'
?>
<section>
<header>
<a href="#" class="logo">LOGO</a>
<nav class="nav">
<li class="nav-item"> 
    <!-- <a href=""> <?php // echo 'hello ' .$_SESSION['username']; ?></a> -->
                <a href="../logout.php">
              <button  type="button" class="btn btn-rounded mx-2 ripple-surface" style="background-color: #338573; color: white">LOGOUT</button>
               </a> 
            </li>

</nav>

</header>
   <!-- <div id="body"> -->
   <div class="container mt-4" id="body">


  <?php
                            require 'dbcon1.php';
                            $con = config::connect(); // The :: notation is used to call a static method on a class
                            $user_id=3;
                            
                            $stmt = $con->query("SELECT * FROM jobs WHERE id_job NOT IN (SELECT id_jobs from candidature) and domain='$domain'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $jobs)
                                {
                                    ?>
                                    <!-- partial -->
<div class="card my-3 offer" data-id="<?= $jobs['id_job'] ?>" data-title="<?= $jobs['job_title'] ?>" data-company="<?= $jobs['company'] ?>" data-date="<?= $jobs['date'] ?>">
  <!-- <div class="card__img-container">
    <img class="card__img" src="//unsplash.it/400" alt="Unsplash random image" />
  </div> -->
  <div class="card__header">
                                   <h2 class="card__title"><?= $jobs['company'] ?></h2>
                                        <h3 class="card__subtitle"><?= $jobs['job_title'] ?></h3></div>
                                        <div class="card__body flow">
    <p><?= $jobs['job_description'] ?></p>
    <p>Salaire: <?= $jobs['job_salaire'] ?>
    </p>
    <div class="oucard">
    <button class="card__cta apply-button">
    <img src="success (4).png" alt="">
      APPLY
                                </button>
    <P><?= $jobs['date'] ?></P></div>
    </div> </div>
                                    <?php
                                }
                            ?>

  
  
  
  



</div></section>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="candida.js"></script>
</body>
</html>
