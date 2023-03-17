<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <?php
// include_once "../user_id.php";
  include "../sidebar.php";
  include "../config.php";
 $con=config::connect();
  ?>
    <section>
    <?php include "../header.php";
    include "hellper\users.php";
$rows=getallrecruter($con) ;
// print_r($rows) ;
foreach($rows as $row)
{
    ?>
<ul class="list-group">
    <a href="chat.php?id=<?=$row['id']?>">
  <li class="list-group-item"><?=$row['username']?></li></a>
</ul>    <?php
}
?>

</section>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>