<?php
// include '../connect.php';
session_start();
//destroy the session
session_unset();
//redirect to login page
header("location: login.php");
?>
<script>
    sessionStorage.removeItem('lastmessage');
</script>