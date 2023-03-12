<?php

session_start();
if(!isset($_SESSION['usernamerec'])){header("location:../loginrecruter.php");
    exit;
  }
  require "userid.php"
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
  include '../sidebar.php';
  ?>
  <section>
<header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
<li class="nav-item"> 
    <!-- <a href=""> <?php // echo 'hello ' .$_SESSION['username']; ?></a> -->
                <a href="../logoutrec.php">
              <button  type="button" class="btn btn-rounded mx-2 ripple-surface" style="background-color: #338573; color: white">LOGOUT</button>
               </a> 
            </li>

</nav>

</header>
<!--addmodal -->
 <div class="modal fade" id="jobAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add job</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savejob">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">job title</label>
                    <input type="text" name="job_title" id="job_title" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">job description</label>
                    <textarea name="job_description" id="job_description" class="form-control" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="">job salaire</label>
                    <input type="number" name="job_salaire" id="job_salaire" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">domain</label>
                    <input type="text" name="domain" id="domain" class="form-control" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal" data-backdrop="false" 
>Save job</button>
            </div>
        </form>
        </div>
    </div>
</div> 

<!-- Edit Modal -->
<div class="modal fade" id="jobEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit job</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updatejob">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="job_id" id="job_id" >

                <div class="mb-3">
                    <label for="">job title</label>
                    <input type="text" name="job_title" id="editjob_title" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">job description</label>
                    <textarea name="job_description" id="editjob_description" class="form-control" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="">job salaire</label>
                    <input type="number" name="job_salaire" id="editjob_salaire" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">domain</label>
                    <input type="text" name="domain" id="editdomain" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update job</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="jobViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View job</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">job title</label>
                    <p id="view_job_title" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">job_description</label>
                    <p id="view_job_description" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">job_salaire</label>
                    <p id="view_job_salaire" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">domain</label>
                    <p id="view_domain" class="form-control"></p>
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
                    <h4 class="text-center">UPDATE PROFIL
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>JOB ID</th>
                                <th>JOB TITLE</th>
                                 <th>DOMAIN</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // require 'dbcon1.php';
                            // $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $recruter_id=3;
                            
                            $stmt = $con->query("SELECT * FROM jobs where recruter_id='$recruter_id'");
                            // $stmt->bindParam(":recruter_id",$recruter_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $job)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $job['id_job'] ?></td>
                                        <td><?= $job['job_title'] ?></td>
                                        <td><?= $job['domain'] ?></td>
                                        <td><?= $job['date'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$job['id_job'];?>" class="viewjobBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$job['id_job'];?>" class="editjobBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$job['id_job'];?>" class="deletejobBtn btn btn-danger btn-sm">Delete</button>
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
       
    <script src="student.js"></script>
</body>
</html>