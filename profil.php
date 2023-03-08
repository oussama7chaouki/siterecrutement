
<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="oussama.css">
    <!-- <link rel="stylesheet" href="index.css"> -->
    <script defer src="test.js"></script>
    <!-- include tweenlight -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>

</head>
<body>
<header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
<li class="nav-item">
    <a href=""> <?php echo 'hello ' .$_SESSION['username']; ?></a> 
                <a href="logout.php">
              <button  type="button" class="btn btn-rounded mx-2" style="background-color: #338573; color: white">LOGOUT</button>
               </a> 
            </li>

</nav>

</header>
<div class="center">
	<div class="slider__wrapper">
		<span class="slider"></span>
		<span class="slider__text">WELCOME<span class="hicham"> <?php echo $_SESSION['username']; ?></span></span>
	</div>
</div>
<div class="content">
      <!-- card -->
     <div class="card">
         <a href="crud\student.php">
            <div class="icon"><i class="material-icons md-36"><img src="resume (2).png" alt=""></i></div>
            <p class="title">Profile</p>
            <p class="text">Click to see or edit your profile page.</p>
         </a> 
      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card">
         <a href="jobapply\index.PHP">
            <div class="icon"><i class="material-icons md-36"><img src="businessman-paper-of-the-application-for-a-job.png" alt=""></i></div>
            <p class="title">JOB SEARCH</p>
            <p class="text">Check all your favourites in one place.</p>
         </a>
      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card">
         <a href="rd\candida.php">
            <div class="icon"><i class="material-icons md-36"><img src="candidate.png" alt=""></i></div>
            <p class="title">JOB APPLY</p>
            <p class="text">delete or change your job application</p>
         </a>
      </div>
      <!-- end card -->
   

   
   </div>
</div>
<footer>
 <h4>© 2022 Jobs Portal. </h4>

<div class="foot">
    <a href="#">CONTACT US</a>
    <a href="#">LOGIN</a>
    <a href="#">SIGN UP</a>

</div>




</footer>
</body>
</html>
