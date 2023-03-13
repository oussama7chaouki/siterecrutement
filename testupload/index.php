<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/31a9ea36c8.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="fileupload.css">
</head>
<body>

<?php include'../sidebar.php' ?>
    <section>
        <div class="wrapper  border shadow p-3 rounded  "  style="margin-right: 240px;margin-top: -61px;"   >
          <header>File Uploader CV</header>
          <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
          <label for="cv">  <i class="fas fa-cloud-upload-alt fa-10x"></i></label>
            <input class="file-input" type="file" value="upload cv" id="cv"  name="photo" hidden>
            <label for="cv">                 <p>Browse File to Upload</p>
</label>
                 <button type="submit" class="btn btn-primary" name="submit" id="suivant" >Suivant</button>
      
      
      
      
      
          </form>
      
      
      
          <section class="progress-area"></section>
        <section class="uploaded-area"></section>
      
        </div>
      
      </body>
      </html>
      </body>
      </html>
    <!-- <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
        Upload a File:
        <label for="cv">upload cv</label>
        <input type="file" value="upload cv" id="cv"  name="photo"  maxlength="10485760">
                <input type="submit" name="submit" value="Start Upload">
    </form>
</body>
</html> -->