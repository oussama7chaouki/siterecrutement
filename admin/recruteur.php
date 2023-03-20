<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
include('config.php');

?>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Recruteur Profiles
            
    </h6>
  </div>

  <div class="card-body">

  <?php
  if(isset($_SESSION['succes1']) && $_SESSION['succes1'] !=""){
   echo '<h2 class="bg-primary text-white" >' . $_SESSION['succes1'] .'</h2>';
   unset($_SESSION['succes1']); //when reload the seesion will destroy in this page
}
if(isset($_SESSION['status1']) && $_SESSION['status1'] !=""){
  echo '<h2 class="bg-danger">' . $_SESSION['status1'] .'</h2>';
  unset($_SESSION['status1']); 
}
?>



    <div class="table-responsive">
      <?php

     $con = config::connect(); 
     $query = $con->prepare("
     SELECT  id ,username ,email,password,status FROM recruters");
     $query->execute();



?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit </th>
            <th>Delete </th>
           
            <th>Status</th>
          </tr>
        </thead>
        <tbody>


        <?php


    

      while($row  =$query->fetch(PDO::FETCH_ASSOC)){

      


?>
     
          <tr>
            <td><?php echo $row['id'];?> </td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['password'];?></td>
            <td>
             <form action="register_editR.php" method="post">
              <input type="hidden" name="edit_id1" value="<?php echo $row['id'];?> ">
            <button type="submit" name="edit1"   class="btn btn-success">Edit</button>
            </td>
            </form>

            <td>
            <form action="code.php" method="post">
              <input type="hidden" name="delete_id1" value="<?php echo $row['id'];?> ">
    <button type="submit" name="delete_btn1" class="btn btn-danger">DELETE</button>
    </form>
     </td>


     <td> <?php
     if($row['status'] == 1){
      echo '<p class="btn btn-success"><a  style="color:white;" href="status1.php?id='.$row['id'].'&status1=0">enable</a></p>';
     }else{
      echo '<p class="btn btn-danger"><a style="color:white;" href="status1.php?id='.$row['id'].'&status1=1">disable</a></p>';
   
     }

     ?>
     </td>
    <?php

}

?>
       
     


    </td>



      </tr>
                 
        
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