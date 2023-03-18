<?php

session_start();
if(isset($_SESSION['username'])){header("location:profil.php");
}
if(isset($_COOKIE['usernamed']) && isset($_COOKIE['password']))
{
  $usernamed = $_COOKIE['usernamed'];
  $password = $_COOKIE['password'];
}
else
{
  $usernamed = $password ="";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>

<script defer src="CHECK .JS"></script>

  </head>
    <title>Document</title>
</head>
<body>
<header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
<li class="nav-item">
                <a href="index.php">
              <button type="button" class="btn btn-rounded mx-2" style="background-color: #338573; color: white">Home</button>
               </a>  
            </li>

</nav>

</header>
<div>
<div class="row d-flex justify-content-center">
<div  class="col-md-6 text-center">
<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link hicham"
      id="tab-login"
      data-mdb-toggle="pill"
      href="#pills-login"
      role="tab"
      aria-controls="pills-login"
      aria-selected="true"
      onclick="outesteur();errormessage()"
      >Login</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="tab-register"
      data-mdb-toggle="pill"
      href="#pills-register"
      role="tab"
      aria-controls="pills-register"
      aria-selected="false"
      onclick="outesteur();errormessage()"
      >Register</a
    >
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->


<div class="tab-content" >
  <div
    class="tab-pane fade"
    id="pills-login"
    role="tabpanel"
    aria-labelledby="tab-login"
  >
  <form action="process.php"   method="POST">
      <div class="text-center mb-3"  >
        <p>Sign in with:</p>
        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>
      <?php if(isset($_GET['error'])){?>
    <p id="error1"><?php echo $_GET['error'];?></p>
    <?php }?>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="text" id="email" name="username" class="form-control" value="<?=$usernamed?>"/>
        <label class="form-label" for="loginName">username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4" style="
    display: flex;
    align-items: center;
">
        <input type="password" id="password" name="password" class="form-control" value="<?=$password?>"/>
        <label class="form-label" for="loginPassword">Password</label>
        <i class="fas fa-eye" style="margin-right: 5px;background-color: #ffff;
    border-radius: 0%;"></i>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="loginCheck"
              name="loginCheck"
              checked
            />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" name="signin" class="btn btn-primary btn-block mb-4" >Sign in</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="#">Register</a></p>
      </div>
    
    </form>
  </div>
  <div
    class="tab-pane fade"
    id="pills-register"
    role="tabpanel"
    aria-labelledby="tab-register"
  >
  <form action="process.php"  method="POST"  >
 
      <div class="text-center mb-3">
        <p>Sign up with:</p>
        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>
      
      <?php if(isset($_GET['error'])){?>
    <p id="error2"><?php echo $_GET['error'];?></p>
    <?php }?>

      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" name="name" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" name="username"  class="form-control" />
        <label class="form-label" for="registerUsername">Username</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" name="email"  class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4"
">
        <input type="password" id="registerPassword" name="password"  class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword"  name="re_password" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

      <!-- Checkbox -->
      <div class="form-check d-flex justify-content-center mb-4">
        <input
          class="form-check-input me-2"
          type="checkbox"
          value=""
          id="registerCheck"
          checked
          aria-describedby="registerCheckHelpText"
        />
        <label class="form-check-label" for="registerCheck">
          I have read and agree to the terms
        </label>
      </div>

      <!-- Submit button -->
      <button type="submit"   name="register"  class="btn btn-primary btn-block mb-3">Sign UP</button>
      
    
    </form>
  </div>
</div>
</div>
</div>
<!-- Pills content -->
<?php include'footer.php'?>
<script
  type="text/javascript"
  src="mdb.min.js"
></script>

<script src="https://kit.fontawesome.com/60589374af.js" crossorigin="anonymous"></script>

<script>
const errorMessage1 = document.getElementById("error1");
const errorMessage2 = document.getElementById("error2");

tabregister=document.getElementById("tab-register");
tablogin=document.getElementById("tab-login");
function errormessage(){
if(tabregister.classList.contains("active")){
  // if(!empty(errorMessage2)){
    errorMessage2.remove();
  //}
  
} 
else{
  // if(!empty(errorMessage1)){
      errorMessage1.remove();
// }
}}
if (errorMessage1 !== null && performance.navigation.type === 1) {
errorMessage1.remove();
}
if (errorMessage2 !== null && performance.navigation.type === 1) {
errorMessage2.remove();
}
</script>
<script>
  tabregister=document.getElementById("tab-register");
tablogin=document.getElementById("tab-login");
pillslogin=document.getElementById("pills-login");
pillsregistre=document.getElementById("pills-register");
  if(localStorage.getItem('signup')==='true'){
    tabregister.classList.add("active");
        pillsregistre.classList.add("show","active");
  }
  else{
    tablogin.classList.add("active");
    pillslogin.classList.add("show","active");
  }
</script>
<script>
  const pswrdField = document.querySelector("form input[type='password']"),
toggleIcon = document.querySelector("form .form-outline i");

toggleIcon.onclick = () =>{
  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.remove("fa-eye");
    toggleIcon.classList.add("fa-eye-slash");
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("fa-eye-slash");
    toggleIcon.classList.add("fa-eye");
  }
}



</script>
</body>
</html>