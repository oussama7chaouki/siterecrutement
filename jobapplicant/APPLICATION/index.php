<?php

session_start();
// $user_id=3;//
//  $idcandidature=$_SESSION['idc'];

if(!isset($_GET['id_job'])){
    header("location:../jobapplicant.php");
    exit;
}
else{
    $id_job=$_GET['id_job'];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PROFILE</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- INPUT -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

<style>
    .offcanvas {
    width: 80%
  }
</style>
    <!-- INPUT -->
</head>
<body>

<div class="offcanvas offcanvas-start" tabindex="-1" id="user-details" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
 <div class="offcanvas-body">
<?php include "candidature.php"?>
  </div> 
</div>
</div>

<?php 
include'../../sidebarrec.php'
?>
<section>
<header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
<li class="nav-item"> 
    <!-- <a href=""> <?php // echo 'hello ' .$_SESSION['username']; ?></a> -->
                <a href="../../logoutrec.php">
              <button  type="button" class="btn btn-rounded mx-2 ripple-surface" style="background-color: #338573; color: white">LOGOUT</button>
               </a> 
            </li>

</nav>

</header>


<!-- View Modal -->
<div class="modal fade" id="candidatureViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View formation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Formation</label>
                    <p id="view_formation" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">school</label>
                    <p id="view_school" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">startyear</label>
                    <p id="view_startyear" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">endyear</label>
                    <p id="view_endyear" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">candidature
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable4" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                                <th>name</th>
                                <th>mail</th>
                                <th>SCORE</th>
                                <th>DECISION</th>
                                 <!-- <th>DOMAIN</th>
                                <th>Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon1.php';
                            include "../../inclusion/score.php";
                             $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $recruter_id=3;
      
                            $stmt = $con->query("SELECT users.*, candidature.*
                            FROM users
                            INNER JOIN candidature ON users.id = candidature.user_id
                            WHERE candidature.id_job = $id_job
                            ORDER BY candidature.score DESC");
                            // $stmt->bindParam(":recruter_id",$recruter_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $job)
                                {
                                    
                                    ?>
                                    <tr>
                                        <td><?= $job['username'] ?></td>
                                        <td><?= $job['email'] ?></td>
                                        <td><?=$job['score']?>%</td>
                                        <td class="decision"><?= $job['status'] ?></td>

                                        <td>
                                            <button type="button" data-user-id="<?=$job['id'];?>" class=" btn btn-info btn-sm view-user" >View</button>
                                            <button type="button" data-user_id="<?=$job['id'];?>" class="accept btn btn-succes btn-sm" data-id_candidature="<?=$job['id_candidature']?>">accept</button>
                                            <button type="button" data-user_id="<?=$job['id'];?>" class="reject btn btn-danger btn-sm" data-id_candidature="<?=$job['id_candidature']?>">refuse</button>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>

          </div>
        </div>
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="jobapplication.js"></script>
<script src="decision.js"></script>
</body>
</html>