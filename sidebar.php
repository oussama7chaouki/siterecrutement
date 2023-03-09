
<head>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo "/".basename(dirname(__FILE__))."/sidebar.css" ?>">
</head>
<div class="header">
      <div class="side-nav">
         <div class="dropdown profile-element" >
            <div class="profile-img-container avatar-view" id="avatarapi"></div>
            <div class="clear m-t-sm">
               <h4 style="margin-top: 4px;" class="text-center text-muted" id="name">Hicham FASSALI</h4>
            </div>
         </div>
         <ul class="nav-links" style="margin-left: -16px;">
            <li> <a href="#"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
            <li> <a href="#"><i class="fa fa-briefcase"></i><span>Mon Cv</span></a></li>
            <li> <a href="#"><i class="fa fa-bullhorn"></i><span>demandes</span></a></li>
            <li> <a href="#"><i class="fa fa-thumb-tack"></i><span>Candidatures</span></a></li>
            <li> <a href="#"><i class="fa fa-user-circle"></i><span>Mon Compte</span></a></li>
            <li> <a href="#"><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
            <div class="active"></div>
         </ul>
      </div>
   </div>
<script src="<?php echo "/".basename(dirname(__FILE__))."/avatarapi.js" ?>"></script>