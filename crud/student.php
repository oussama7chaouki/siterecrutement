<?php

session_start();
if(!isset($_SESSION['username'])){header("location:../login.php");
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
<!--addmodal -->
 <div class="modal fade" id="formationAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add formation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveformation">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>

                <div class="mb-3">
                    <label for="">Formation</label>
                    <input type="text" name="formation" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">School</label>
                    <input type="text" name="school" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Start year</label>
                    <input type="number" name="startyear" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">End year</label>
                    <input type="number" name="endyear" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal" data-backdrop="false" 
>Save formation</button>
            </div>
        </form>
        </div>
    </div>
</div> 

<!-- Edit Modal -->
<div class="modal fade" id="formationEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit formation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateformation">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="formation_id" id="formation_id" >

                <div class="mb-3">
                    <label for="">Formation</label>
                    <input type="text" name="formation" id="formation" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">School</label>
                    <input type="text" name="school" id="school" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Start Year</label>
                    <input type="number" name="startyear" id="startyear" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">End Year</label>
                    <input type="number" name="endyear" id="endyear" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update formation</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="formationViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h4 class="text-center">UPDATE PROFIL
                    </h4>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Formation</th>
                                <th>school</th>
                                <th>startyear</th>
                                <th>endyear</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // require 'dbcon1.php';
                            // $con = config::connect(); // The :: notation is used to call a static method on a class
                            // $user_id=3;
                            
                            $stmt = $con->query("SELECT * FROM formations where user_id='$user_id'");
                            // $stmt->bindParam(":user_id",$user_id);
                            $stmt->execute();
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            // Get the total number of contacts, this is so we can determine whether there should be a next and previous button
                                foreach($data as $formation)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $formation['formation'] ?></td>
                                        <td><?= $formation['school'] ?></td>
                                        <td><?= $formation['startyear'] ?></td>
                                        <td><?= $formation['endyear'] ?></td>
                                        <td>
                                            <button type="button" value="<?=$formation['id_formation'];?>" class="viewformationBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$formation['id_formation'];?>" class="editformationBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$formation['id_formation'];?>" class="deleteformationBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 col-4 mx-auto my-4">
                    <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#formationAddModal">
                            Add formation
                        </button>
                    </div>
                </div>
<?php include 'test.php'?> 
<?php include 'inputtags\input.php'?>  

          </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
       
    <script src="student.js"></script>
    <script src="test.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js" ></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
        <script src="inputtags\input.js"></script>
</body>
</html>