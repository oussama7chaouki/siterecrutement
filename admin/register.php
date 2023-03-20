<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('config.php');

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">
    <?php

if(isset($_SESSION['succes']) && $_SESSION['succes'] !=""){
   echo '<h2 class="bg-primary text-white" >' . $_SESSION['succes'] .'</h2>';
   unset($_SESSION['succes']); 
}
if(isset($_SESSION['status']) && $_SESSION['status'] !=""){
  echo '<h2 class="bg-danger">' . $_SESSION['status'] .'</h2>';
  unset($_SESSION['status']); 
}


?>

    <div class="table-responsive">
      <?php

     $con = config::connect(); 
     $query = $con->prepare("
     SELECT * FROM admin");
     $query->execute();



?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>email </th>
            <th>password</th>
            <th>Edit </th>
            <th>Delete </th>
          </tr>
        </thead>
        <tbody>


        <?php


  

      while($row  =$query->fetch(PDO::FETCH_ASSOC)){

      


?>
     
          <tr>
            <td><?php echo $row['id_admin'];?> </td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['password'];?></td>
            <td>
             <form action="register_edit.php" method="post">
              <input type="hidden" name="edit_id" value="<?php echo $row['id_admin'];?> ">
            <button type="submit" name="edit"   class="btn btn-success">Edit</button>
            </td>
            </form>

            <td>
            <form action="code.php" method="post">
              <input type="hidden" name="delete_id" value="<?php echo $row['id_admin'];?> ">
    <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
    </form>
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>