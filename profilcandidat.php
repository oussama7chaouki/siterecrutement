


<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="hicham2.css">

    <script src="https://kit.fontawesome.com/31a9ea36c8.js" crossorigin="anonymous"></script>
   
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    
<?php include 'sidebar.php'?>
<section>

<div class="container green-line" >
  <form class="border shadow p-3 rounded"  action="process.php" method="post" id="myform" style=" height: 976px;">
    <h4 class="text-muted"> <i style="padding-right: 4px; font-size: 20px;"  class="fa fa-user-circle"></i>Informations personnelles</h4>
    <hr class="my-4 blue-line">

    <div class="mb-2" >
      
      <label for="genre" class="form-label text-muted" >Genre <span class="text-danger">*</span></label>
      <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="genre"  value="male">

      <label class="form-check-label text-muted" for="male" >
        Homme  </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="" name="genre" value="female">
        <label class="form-check-label text-muted" for="male" >
         Femme </label>
      </div>
      
    </div>
    
    <div class="mb-2 ">
      
      <label for="nom" class="form-label text-muted">Nom <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nom"  name="nom">
      <span id="span1"></span>
    </div>
    
    <div class="mb-1">
      <label for="prenom" class="form-label text-muted">Prenom <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="prenom" name="prenom" >
      <span id="span2"></span>
    </div>

    <div class="mb-1">
      <label for="date" class="form-label text-muted">Date de naissance <span class="text-danger">*</span></label>
      <input type="date" class="form-control" id="date" name="date" >
      <span id="span5"></span>
    </div>
    <div class="mb-1">
      <label for="text" class="form-label text-muted">Ville <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="ville" name="ville">
      <span id="span4"></span>
    </div>
    <div class="mb-1">
      <label for="tel" class="form-label text-muted" >phone number <span class="text-danger">*</span></label>
     
      <input type="tel" class="form-control"  name="tel" id="tel" placeholder="&#x1F1F2;&#x1F1E6;+212">
      <span id="span3"></span>

    </div>
    <br>
    <br>
    <div class="mb-2">
  <label for="select" class="form-label text-muted">Domaine <span class="text-danger">*</span></label>
  <select class="form-select" id="select" name="select">
    <option selected disabled value="">Choose an option</option>
    <option value="Achat">Achat</option>
    <option value="Administratif">Administratif</option>
    <option value="Agricole">Agricole</option>
    <option value="Alimentation">Alimentation</option>
    <option value="Aménagement">Aménagement</option>
    <option value="Architecture">Architecture</option>
    <option value="Artisanat">Artisanat</option>
    <option value="Assurance">Assurance</option>
    <option value="Banque">Banque</option>
    <option value="Btp">Btp</option>
    <option value="Chimie">Chimie</option>
    <option value="Commerce">Commerce</option>
    <option value="Communication">Communication</option>
    <option value="Comptabilité">Comptabilité</option>
    <option value="Culture">Culture</option>
    <option value="Digital">Digital</option>
    <option value="Droit">Droit</option>
    <option value="Economie">Economie</option>
    <option value="Edition">Edition</option>
    <option value="Emploi public">Emploi public</option>
    <option value="Enseignement">Enseignement</option>
    <option value="Environnement">Environnement</option>
    <option value="Finance">Finance</option>
    <option value="Gestion">Gestion</option>
    <option value="Grande distribution">Grande distribution</option>
    <option value="Hôtellerie">Hôtellerie</option>
    <option value="Immobilier">Immobilier</option>
    <option value="Industrie">Industrie</option>
    <option value="Informatique">Informatique</option>
    <option value="Ingénierie">Ingénierie</option>
    <option value="Logistique">Logistique</option>
    <option value="Marketing">Marketing</option>
    <option value="Mécanique">Mécanique</option>
    <option value="Médias">Médias</option>
    <option value="Petite enfance">Petite enfance</option>
    <option value="Physique">Physique</option>
    <option value="Propreté">Propreté</option>
    <option value="Ressources humaines">Ressources humaines</option>
    <option value="Restauration">Restauration</option>
    <option value="Santé">Santé</option>
    <option value="Secrétariat">Secrétariat</option>
    <option value="Sécurité">Sécurité</option>
    <option value="Service clientèle">Service clientèle</option>
    <option value="Services à la personne">Services à la personne</option>
    <option value="Social">Social</option>
    <option value="Télécommunications">Télécommunications</option>

    <option value="Tourisme">Tourisme</option>
    <option value="Transport">Transport</option>
    <option value="Vente">Vente</option>
    
</select>
<span id="span6"></span>
    <br>
    <hr class="my-4 blue-line">
    <button type="submit" class="btn btn-primary" name="suivant" id="suivant" >Suivant</button>
  
    
  </form>

</div>
</section>
<script src="verify.js"> </script>



</body>
</html>



















