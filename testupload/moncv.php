
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
  </head>
  <body>
    
  <?php
// include_once('../sidebar.php');
session_start();


include_once('../sidebar.php');
include_once("../user_id.php");


$query1 = $con->prepare("SELECT cv FROM information WHERE user_id =$user_id");

try {
    $query1->execute();
    $result = $query1->fetchColumn();
    $cv_path = $result;


} catch (PDOException $e) {
    echo $e->getMessage();
}


$filename = basename($cv_path);
echo $cv_path;

$cvname = $filename;

$file_path = "dossier/" . $cvname;

$file_embed = "<iframe  src='$file_path' width='70%' height='600px'>




</iframe>";
echo '<section  >';
echo '<div class="border shadow p-3 rounded" style="width: 60%; margin-left:220px;" >';
// Display the file in a div
echo '<div id="file-container" style="width:143%">' . $file_embed . '</div>';
echo '</div>';
echo '</section>';
?>


  </body>
  </html>
    
