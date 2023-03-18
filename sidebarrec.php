
<head>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="<?php echo "/".basename(dirname(__FILE__))."/sidebar.css" ?>">
</head>
<div class="header">
      <div class="side-nav">
         <div class="dropdown profile-element" >
            <div class="profile-img-container avatar-view" id="avatarapi"></div>
            <div class="clear m-t-sm">
               <h4 style="margin-top: 4px;" class="text-center text-muted" id="name"></h4>
            </div>
         </div>
         <ul class="nav-links" style="margin-left: -16px;">
            <li> <a href="<?php echo "/".basename(dirname(__FILE__))."/profilrecruter.php" ?>"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
            <li> <a href="<?php echo "/".basename(dirname(__FILE__))."/jobapplicant\jobapplicant.php" ?>"><i class="fa fa-user-circle"></i><span>Applicant</span></a></li>
            <li> <a href="<?php echo "/".basename(dirname(__FILE__))."/crudrecruter\student.php" ?>"><i class="fa fa-thumb-tack"></i><span>Control</span></a></li>
            <li> <a href="<?php echo "/".basename(dirname(__FILE__))."/message/chat.php" ?>"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"  x="0" y="0" viewBox="0 0 404.644 404.644" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M5.535 386.177c-3.325 15.279 8.406 21.747 19.291 16.867l367.885-188.638h.037c4.388-2.475 6.936-6.935 6.936-12.08 0-5.148-2.548-9.611-6.936-12.085h-.037L24.826 1.6C13.941-3.281 2.21 3.189 5.535 18.469c.225 1.035 21.974 97.914 33.799 150.603l192.042 33.253-192.042 33.249C27.509 288.26 5.759 385.141 5.535 386.177z" data-original="#096ad9" class=""></path></g></svg><span>Message</span></a></li>
            <li> <a href="#<?php // echo "/".basename(dirname(__FILE__))."/profilcandidat1.php" ?>"><i class="fa-solid fa-gear"></i><span>Settings</span></a></li>
            <div class="active"></div>
         </ul>
      </div>
   </div>
<script src="<?php echo "/".basename(dirname(__FILE__))."/avatarapi.js" ?>"></script>
<script src="https://kit.fontawesome.com/60589374af.js" crossorigin="anonymous"></script>