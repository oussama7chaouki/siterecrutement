
<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>joB APPLICATION</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../header.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/31a9ea36c8.js" crossorigin="anonymous"></script>
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
                            // require 'dbcon1.php';
                            // $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $user_id=70;
                            require "../user_id.php";
                            include "../inclusion\SCORE.PHP";
//                             $stmt0 = $con->query("SELECT `select`
//                             FROM information
//                             WHERE user_id = $user_id
//                             ");
//                             // $stmt->bindParam(":user_id",$user_id);
//                             $stmt0->execute();
//                             $domain=$stmt0->fetchColumn();
// // echo $domain;
// echo "hello";

                            // $stmt = $con->query("SELECT *
                            // FROM jobs
                            // WHERE domain in (SELECT `select`
                            // FROM information
                            // WHERE user_id = $user_id
                            // )
                            // AND id_job NOT IN (
                            //   SELECT id_job
                            //   FROM candidature
                            //   WHERE user_id = $user_id
                            // )
                            // ") ;
                                 $stmt = $con->query("SELECT jobs.*
                                 FROM jobs
                                 LEFT JOIN candidature ON jobs.id_job = candidature.id_job AND candidature.user_id = $user_id
                                 JOIN information ON jobs.domain = information.select AND information.user_id = $user_id
                                 WHERE candidature.id_job IS NULL
                            ");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                            if($stmt->rowCount()<1){
                              ?>
                              <div class="card my-3 offer" style="border-radius:5em">
  <!-- <div class="card__img-container">
    <img class="card__img" src="//unsplash.it/400" alt="Unsplash random image" />
  </div> -->
  <div class="card__header">
                                   <h2 class="card__title"></h2>
                                        <h3 class="card__subtitle">No more job</h3></div>
                                        <div class="card__body flow">
    <p>more job offer coming later</p>
    <p>
    </p>
    <div class="oucard">
    <button class="card__cta " onclick="window.location.href='../profil.php'">
    <i class="fa-solid fa-backward"></i>
      GO BACK
                                </button>
    <P></P></div>
    </div> </div>
    <?php
                            }
                                foreach($data as $jobs)
                                {
                                    ?>
                                    <!-- partial -->
<div class="card my-3 offer" style="border-radius:5em"  data-id="<?= $jobs['id_job'] ?>" data-title="<?= $jobs['job_title'] ?>" data-company="<?= $jobs['company'] ?>" data-date="<?= $jobs['date'] ?>" data-score="<?=scores($con,$user_id,$jobs['id_job'])?>">

  <div class="card__header">
    <div class="card__img-container" style="float:right">
    <img class="card__img" src="//unsplash.it/400" alt="Unsplash random image" />
  </div>                              
     <h2 class="card__title"><?= $jobs['company'] ?></h2>
                                        <h3 class="card__subtitle"><?= $jobs['job_title'] ?></h3></div>
                                        <div class="card__body flow">
    <p><?= $jobs['job_description'] ?></p>
    <p>Salaire: <?= $jobs['job_salaire'] ?> DH/MOIS
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
