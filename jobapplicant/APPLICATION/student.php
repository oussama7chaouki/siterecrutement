<?php
                            require 'dbcon1.php';
                            $con = config::connect(); // The :: notation is used to call a static method on a class
session_start();
if(!isset($_SESSION['usernamerec'])){header("location:../loginrecruter.php");
    exit;
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
    <link rel="stylesheet" href="../header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- INPUT -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" />
    
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<style>
    .tokenfield .token{
        height: 2em;
    }
</style>
    <!-- INPUT -->
    <!-- <link rel="stylesheet" href="../sidebar.css"> -->
</head>

<body>
 <?php
  include '../../sidebar.php';
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
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Dropdown button
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">UPDATE PROFIL
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>JOB ID</th>
                                <th>JOB TITLE</th>
                                <th>SCORE</th>
                                 <!-- <th>DOMAIN</th>
                                <th>Date</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // require 'dbcon1.php';
                            // $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $recruter_id=3;
                            
                            $stmt = $con->query("SELECT * FROM users where id in (select user_id from `candidature` where id_jobs='10')");
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
                                        <!-- <td><?= $job['score'] ?></td> -->
                                        <td>100%</td>
                                        <!-- <td>?= $job['domain'] ?></td>
                                        <td>?= $job['date'] ?></td> -->
                                        <td>
                                            <button type="button" value="<?=$job['id'];?>" class="viewjobBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$job['id'];?>" class="editjobBtn btn btn-success btn-sm">Accept</button>
                                            <button type="button" value="<?=$job['id'];?>" class="deletejobBtn btn btn-danger btn-sm">Refuse</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 col-4 mx-auto my-4">
                    <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#jobAddModal">
                            Add job
                        </button>
                    </div>
                </div>

          </div>
        </div>
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="student.js"></script> -->
</body>
</html>