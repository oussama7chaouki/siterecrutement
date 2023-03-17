<head>
<title></title>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
<p>Hi <?php echo $user["User"]; ?> </p>
<input type="text" id="fromUser" value=<?php echo $user["Id"]; ?> hidden />
<p>Send message to:</p>
<ul>
<?php
Smsgs-mysqli_query($connect, "SELECT FROM users")
or die("Failed to query database.mysql_error());
while($msg - mysqli_fetch_assoc($msgs))
{
echo '<li><a href="?toUser-' . $msg["Id"],">' . $msg["User"]. '</a></li>';
}
</ul>
<a href="index.php"><-- Back</a>
</div> I
<div class="col-md-4">
</div>
<div class="col-md-4">
</div>
</div>
</div>
</body>
</html>