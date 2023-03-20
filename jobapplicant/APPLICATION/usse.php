<?php 
session_start();
ob_start(); // start output buffering
$response=$_SESSION["response"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realisation de CV</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />

<style>
    *{font-size:10px;}
    
</style>
</head>
<body>
    <main>
       <header>
     <div class="photo">
           <!-- <img src="img.jpg" width="100%" height="100%" alt="">  -->
        </div> 
      <div class="des">
            <!-- <h3></h3>
            <p class="post">Développeur Web & Mobile</p> -->
        </div>
        <div class="right">
                
                        <!-- <h2>Informations personnelles</h2> -->
                        <ul>
                          <li>Nom :<?php  echo $response["array0"]["nom"] ?> </li>
                          <li>Prénom:<?php  echo $response["array0"]["prenom"] ?></li> 
                          <!-- <li>Email :<?php // echo $response["array0"]["mail"] ?> </li> -->
                          <li>Téléphone :0<?php  echo $response["array0"]["tel"] ?></li>
                        </ul>
                      </div>
        </div> 
</header>
<p style="text-align: center; margin-inline: 10px;">Je suis très intéressé(e) par le poste proposé au sein de votre entreprise 
    et je tiens à vous faire part de ma candidature pour le poste en question.
    Mon expérience professionnelle précédente m’a permis de développer mes compétences et
     j’aimerais avoir la chance d’appliquer ces compétences au sein de votre entreprise.
      J'ai également une forte volonté d'apprendre et de m'adapter rapidement à de nouveaux 
      environnements de travail.</p>

<section class="section-left">
 

<h4>Diplômes et Formations</h4>
<hr class="light">
<div class="div">
   
   <strong>
<?php 
// Récupérer la première array de formation
$formations = $response['array1'];

// Vérifier si des formations ont été trouvées
if (!empty($formations)) {
  // Afficher les formations sous forme de liste
  echo '<ul>';
  foreach ($formations as $formation) {
    echo '<li>' . $formation['formation'] . '</li>';
    echo '<li>' . $formation['startyear'] .'-'.$formation['endyear'] . '</li>';
    echo '<li>' . $formation['school'] . '</li>';
// echo "<br>";
  }
  echo '</ul>';
} else {
  // Aucune formation n'a été trouvée
  echo 'Aucune formation trouvée.';
}


?>
   </div>
</div></strong>

<h4>Expériences professionnelles</h4>
<hr class="light">
<?php

        $experiences = $response['array2'];
        foreach ($experiences as $experience) {
            echo "<ul>";
            echo"<li>";
            echo "<p>";
            echo  $experience["experience"] .'   '. $experience["startyear"] .'-'. $experience["startyear"] ;
            echo "</p>";
            echo "<p>";
                                                   echo  "company:". $experience["company"] ;
            echo "</p>";
            echo"</li>";
               echo"</ul>";
        }
        if (empty($experiences)) {
            echo "Aucune expérience trouvée pour l'utilisateur ";
        }
        ?>
</div>
</section>

<section class="section-right">
<h4>Competences </h4>
<hr class="light">
<div class="skls">

        <div class="po">
 <?php // Convertir le tableau associatif en JSON
// $json_response = json_encode($response['array3']);

// Afficher la réponse dans un élément HTML
// echo '<pre>' . '<ul>'. '<li>' . "<PRE>".$json_response.'</PRE>'.'<br>' . '</li>'.'</ul>'. '</pre>'; 

// $response est le tableau associatif contenant les données récupérées de la base de données
if(isset($response["array3"][0])) { 
    $skillsou=$response["array3"][0]["skill"];
    $skillsou=explode(",",$skillsou);
    // Vérifiez d'abord si le tableau de compétences existe dans le tableau de réponse
    echo "<ul>";
    $i=0;
    foreach($skillsou as $competence) {
       
        if($i%3==0){
            echo "<li>".$competence;}
    else
        if($i%3==0 && $i!=0)
        {echo "</li>";}
        else{
            echo ",".$competence;

        }
       $i++;  
       
       
    }echo "</ul>";
}else {
    echo "Aucune compétence trouvée.";
}



?>

</div>
         


        <div class="po">
            <p></p>
  
        </div>
    </div>


<h4>Langues</h4>
<hr class="light">
<div class="skls">
 <div class="po">
    <?php

    if(isset($response["array4"][0])) { 
        $skillsou=$response["array4"][0]["language"];
        $skillsou=explode(",",$skillsou);
        // Vérifiez d'abord si le tableau de compétences existe dans le tableau de réponse
        echo "<ul>";
        $i=0;
        foreach($skillsou as $competence) {
           
                echo "<li>".$competence."</li>";

    

           
           
        }echo "</ul>";
    }else {
        echo "Aucune compétence trouvée.";
    }
    
    
    
    ?>
            <p></p>

        </div>
        <div class="po">















            <p> 












































             </p>

        </div>
</div>

</section>


<div class="srkl">

</div>
</main>
</body>

</html>
<?php 
// your PHP code here
// ...

$html = ob_get_clean(); // get the output and clean the buffer

// write the output to a file
file_put_contents('output.html', $html);
?>