<link rel="stylesheet" href="<?php echo "/".basename(dirname(__FILE__))."/header.css" ?>">
<header>

<a href="#" class="logo">DREAMJOB</a>
<nav class="nav">
   <li class="nav-item">
      <!-- <a href=""> <?php // echo 'hello ' .$_SESSION['username']; 
                        ?></a> -->
      <a href="<?php echo "/".basename(dirname(__FILE__))."/logout.php" ?>">
         <button type="button" class="btn btn-rounded mx-2 ripple-surface" style="background-color: #338573; color: white">LOGOUT</button>
      </a>
   </li>

</nav>

</header>