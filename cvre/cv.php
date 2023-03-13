<?php

session_start();
if (!isset($_SESSION['username'])) {
   header("location:login.php");
}
// require "user_id.php";
// $stmt = $con->query("select cv from information where user_id=$user_id
// ");
// // $stmt->bindParam(":user_id",$user_id);
// $stmt->execute();
// $cvv= $stmt->fetchColumn();

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
   <link rel="stylesheet" href="header.css">
   <!-- <link rel="stylesheet" href="index.css"> -->
   <script defer src="test.js"></script>
   <!-- include tweenlight -->
   <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
   
   <!-- <link rel="stylesheet" href="sidebar.css"> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
 <?php
//   include 'sidebar.php';
  ?>
<section>
   <header>

<a href="#" class="logo">LOGO</a>
<nav class="nav">
   <li class="nav-item">
      <!-- <a href=""> <?php // echo 'hello ' .$_SESSION['username']; 
                        ?></a> -->
      <a href="logout.php">
         <button type="button" class="btn btn-rounded mx-2 ripple-surface" style="background-color: #338573; color: white">LOGOUT</button>
      </a>
   </li>

</nav>

</header>
<!-- <object data="testupload\<?=$cvv?>" type="application/pdf">
        <div>No online PDF viewer installed</div>
    </object> -->
<!-- <div class="embed-responsive embed-responsive-16by9">
            <iframe id="pdf-js-viewer" src="testupload\" title="webviewer" ></iframe>
</div> -->
      <!-- end card -->
      <!-- frameborder="0" width="500" height="600" -->
      <div id="adobe-dc-view" style="height: 360px; width: 500px;"></div>
<script src="https://documentservices.adobe.com/view-sdk/viewer.js"></script>
<script type="text/javascript">
	document.addEventListener("adobe_dc_view_sdk.ready", function(){ 
		var adobeDCView = new AdobeDC.View({clientId: "6f3248f1112b4c57a8589eebaa8e650c", divId: "adobe-dc-view"});
		adobeDCView.previewFile({
			content:{location: {url: "../testupload/DOSSIER/Admin1.pdf"}},
			metaData:{fileName: "Bodea Brochure.pdf"}
		}, {embedMode: "SIZED_CONTAINER"});
	});
</script>

   </div>
   </div>
   <footer>
      <h4>© 2022 Jobs Portal. </h4>

      <div class="foot">
         <a href="#">CONTACT US</a>
         <a href="#">LOGIN</a>
         <a href="#">SIGN UP</a>

      </div>
     
      <div id="pdf-viewer"></div>

      <!-- <div id="main"><div id="scroller"><div id="sizer" style="display: none;"></div><div id="content"><embed id="plugin" type="application/x-google-chrome-pdf" original-url="testupload\<?=$cvv?>" src="chrome-extension://mhjfbmdgcfjbbpaeojofohoefgiehjai/aec1dd5c-270e-403b-8c80-28611f47fa6e" background-color="4283586137" javascript="allow" pdf-viewer-update-enabled=""></div></div><div id="content-focus-rectangle" hidden=""></div></div> -->

   </footer>
   </section>


 
</body>

</html>