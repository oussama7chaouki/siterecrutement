<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('config.php');
?>



<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Recruteur profil
          
    </h6>
  </div>

  <div class="card-body">
    <?php
if(isset($_POST['edit1'])){
    try {
        $con = config::connect(); 
        $id = $_POST['edit_id1'];
        $query = "SELECT * FROM recruters WHERE id=:id";
        $stmt = $con->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Do something with $row
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }



?>

  <form action="code.php" method="post">
    <input type="text" name="edit_id1" value="<?php echo $row['id'];?>">
  <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['username'];?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email"   value="<?php echo $row['email'];?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password"  value="<?php echo $row['password'];?>"   class="form-control" placeholder="Enter Password">
            </div>
            <a href="recruteur.php" class="btn btn-danger"> Cancel</a>
  <button  type="submit" name="updatebtn1"   class="btn btn-primary">Update</button>

</form>
<?php


}

  ?>



  </div>
  </div>
</div>

</div>






<?php
include('includes/scripts.php');
include('includes/footer.php');
?>