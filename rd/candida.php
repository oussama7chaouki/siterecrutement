<?php

session_start();


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
</head>
<body>
<header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
<li class="nav-item">
    <a href=""> <?php echo 'hello ' .$_SESSION['username']; ?></a> 
                <a href="../index.html">
              <button type="button" class="btn btn-rounded mx-2" style="background-color: #338573; color: white">LOGOUT</button>
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

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>titre</th>
                                <th>company</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon1.php';
                            $con = config::connect(); // The :: notation is used to call a static method on a class
                            $user_id=3;
                            
                            $stmt = $con->query("SELECT * FROM candidature where user_id='3'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $candidature)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $candidature['date'] ?></td>
                                        <td><?= $candidature['job_title'] ?></td>
                                        <td><?= $candidature['company'] ?></td>
                                        <td><?= $candidature['status'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$candidature['id_candidature'];?>" class="viewcandidatureBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$candidature['id_candidature'];?>" class="deletecandidatureBtn btn btn-danger btn-sm">Delete</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="candida.js"></script>

</body>
</html>