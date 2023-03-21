<?php session_start() ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .height-100 {
    height: 100vh
}

.card {
    width: 400px;
    border: none;
    height: 300px;
    box-shadow: 0px 5px 20px 0px #d2dae3;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center
}

.card h6 {
    color: #338573;
    font-size: 20px
}

.inputs input {
    width: 40px;
    height: 40px
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0
}

.card-2 {
    background-color: #fff;
    padding: 10px;
    width: 350px;
    height: 100px;
    bottom: -50px;
    left: 20px;
    position: absolute;
    border-radius: 5px
}

.card-2 .content {
    margin-top: 50px
}

.card-2 .content a {
    color: red
}

.form-control:focus {
    box-shadow: none;
    border: 2px solid red
}

.validate {
    border-radius: 20px;
    height: 40px;
    background-color: #338573;
    border: 1px solid #338573;
    width: 140px
}
    </style>
  </head>
  <body>
    
  <div class="container height-100 d-flex justify-content-center align-items-center">
    <div class="position-relative">
        <div class="card p-2 text-center">
            <h6>Please enter the one time password <br> to verify your account</h6>
            <div> <span>A code has been sent to</span> <small><?=$_SESSION['mail']?></small> </div>
            <form action="" method="post">
            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input class="m-2 text-center form-control rounded" type="text" id="first" name="first" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="second"name="second" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="third" name="third" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fourth" name="fourth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fifth" name="fifth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="sixth" name="sixth" maxlength="1" /> </div>
            <div class="mt-4"> <button class="btn btn-danger px-4 validate" name="verify">Validate</button> </div></form>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        validation=document.querySelector('.validate')
        sixth=document.getElementById('sixth');
        validation.addEventListener('click', function(event) {if(sixth.value===''){ event.preventDefault()
            console.log("hello");
         }
       })
function OTPInput() {
const inputs = document.querySelectorAll('#otp > *[id]');
for (let i = 0; i < inputs.length; i++) {
     inputs[i].addEventListener('keydown', function(event) {
         if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if ((event.keyCode> 47 && event.keyCode < 58)|(event.keyCode> 95 && event.keyCode < 106)) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); }   } }) }; } 
         
         OTPInput();}  );
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>



















<?php 
    include('config.php');
    $con=config::connect();
    if(isset($_GET["OTP"])){
        $otp_code = $_GET["OTP"];
        
    }
    if(isset($_POST["verify"])){
        if(isset($_SESSION['tmpusername'])){
            $userrec="USERS";
            $pro="profil";
            $ss="true";
        }
        else if(isset($_SESSION['tmpusernamerec'])){
            $userrec="recruters";
            $pro="profilrecruteur";
            $ss="false";
        }
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        if(!isset($otp_code)){
           $otp_code = $_POST['first'].$_POST['second'].$_POST['third'].$_POST['fourth'].$_POST['fifth'].$_POST['sixth'];  
        }
       


        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code <?=$otp_code?>");
           </script>
           <?php
        }else{
            $soket=  $con->prepare("UPDATE $userrec SET activation = 1 WHERE email = '$email'") ;
try {
    $soket->execute();
    if($ss=="true"){
        echo "hzllo";
        $_SESSION['username']=$_SESSION['tmpusername'];
    }
    else if($ss=="false"){
        $_SESSION['usernamerec']=$_SESSION['tmpusernamerec'];

    }else{
        echo "prblm";
    }
    header("location:$pro.php");

} catch (PDOException $e) {
$e->getMessage();
}

        }

    }

?>