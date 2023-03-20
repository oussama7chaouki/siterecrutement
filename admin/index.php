<?php
error_reporting(E_ALL ^ E_NOTICE);  

include('includes/header.php'); 
include('includes/navbar.php'); 
include('security.php');

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4" style="margin-left: 110px;">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
            
              <?php
               require 'config.php';
             $con = config::connect(); 
           $query = "SELECT id_admin FROM admin ORDER BY id_admin";
           $stmt = $con->query($query);
           $numRows = $stmt->rowCount();
           echo "<h4> Total Admin: " .$numRows. "</h4>";
         
?>

             

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Recruteur</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
              //  require 'config.php';
             $con = config::connect(); 
           $query1 = "SELECT id FROM recruters ORDER BY id";
           $stmt1 = $con->query($query1);
           $numRows1 = $stmt1->rowCount();
           echo "<h4> Total Recruteur: " .$numRows1. "</h4>";
         
?>


              </div>
            </div>
            <div class="col-auto">
      
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Registered Candidat</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
<?php

                  $con = config::connect(); 
           $query2 = "SELECT id FROM users ORDER BY id";
           $stmt2 = $con->query($query2);
           $numRows2 = $stmt2->rowCount();
           echo "<h4> Total Candidat: " .$numRows2. "</h4>";
         
?>

                  </div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>







  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>