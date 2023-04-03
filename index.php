<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width
    , initial-scale=1.0">
    <title>Site recrutement</title>
    <link rel="icon" type="image/png" href="candidate.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
    <link rel="stylesheet" href="index1.css">
    <script defer src="hicham.js"></script>

</head>
<body>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">LoG</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
        <div class="rows">
      <button type="button" class="btn btn-primary">
      <img src="image\candidate (3).png" alt="" class="btnicon"  onclick="window.location.href='login.php';">  
      Employe</button>
      <button type="button" class="btn btn-primary"  onclick="window.location.href='loginrecruter.php';">
      <img src="image\recruitment (2).png" alt="" class="btnicon">  
      Recruter</button>    </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modaal end -->
<header>

 <a href="#" class="logo">DREAMJOB</a>
 <nav class="nav">

 <a href="loginrecruter.php">Recruter</a>
 <a href="login.php">Candidate</a>
 
 </nav>

</header>

<section class="main">

<div class="content">
<h2 id="oussamach">find a <span id="och" class="grish">job </span> that<br><span class="grish">matches</span> your <span id="ouch">  passion</span></h2>
<h3>Connecting job seekers with their dream careers, one click at a time.</h3>

<div class="row">
<!-- Button trigger modal -->

    <button  class="card" data-bs-toggle="modal" data-bs-target="#exampleModal" id="signin">SIGN IN</button>
        

    <button   class="card" data-bs-toggle="modal" data-bs-target="#exampleModal" id="signup">SIGN UP</button>

</div>


</div>
</section>






<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#C4F2FF" fill-opacity="1" d="M0,160L60,165.3C120,171,240,181,360,197.3C480,213,600,235,720,229.3C840,224,960,192,1080,165.3C1200,139,1320,117,1380,106.7L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
  </svg> -->
<!----------2end section---->
<section class="main2">


    <div>
       

       

        <h2>why we are different?</h2>
        <h3>make the choosing process<br>
            faster  and easier for both side<br>
            by calculating the candidate score <br>
           and parsing data from the cv doc directly</h3><br>
            </div>
           <img id="indeximg" src="hicham.png" width="600" height="500" style="float:right; ">

    </div>

   


</section>



<?php include 'footer.php'?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
const signup= document.getElementById("signup")
const signin= document.getElementById("signin")

signup.addEventListener("click",()=>{
localStorage.setItem("signup",true)
})
signin.addEventListener("click",()=>{
localStorage.setItem("signup",false)
})
</script>


</body>
</html>