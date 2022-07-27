<?php
session_start();

$id = $_GET['pdt'];

foreach($produits as $produit){
    $nom = $produit->nom;
    $idPdt = $produit->id;
    $image = $produit->image;
    $description = $produit->description;
    $prix = $produit->prix;
}

if(!isset($_SESSION['session77'])){
  header("Location: ../login.php");
}

if(empty($_SESSION['session77'])){
  header("Location: ../login.php");
}

if(!isset($_GET['pdt'])){
header("Location: afficher.php");
}
    if(empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])){
    header("Location: afficher.php");
}

require("../config/commandes.php");
$produits=getProduits($id);

?>
<!DOCTYPE html>
<html>
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<title>Title of the document</title>
</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="afficher.php">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#" style="font-weight: bold; color: green">Modification</a>
        </li>
      </ul>
       <div style="display: flex; justify-content: flex-end;">
      <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
    </div>
  </div>
</nav>


    <div class="album py-5 bg-light">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1">Titre de l'image</label>
    <input type="name" class="form-control" name="image" value="<?= $image ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Nom du produit</label>
    <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Prix</label>
    <input type="number" class="form-control" name="prix" value="<?= $prix ?>" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Description</label> 
    <textarea class="form-control" name="description" value="<?= $description ?>" required></textarea>
  </div>
  <button type="submit" name="valider" class="btn btn-success">Enregistrer les modifications</button>
</form>
    </div></div></div>

</body>

</html> 
<?php

if(isset($_POST['valider']))
{
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['description']))
    {
      if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['description']))
    {
      $image = htmlspecialchars(strip_tags($_POST['image']));
      $nom = htmlspecialchars(strip_tags($_POST['nom']));
      $prix = htmlspecialchars(strip_tags($_POST['prix']));
      $description = htmlspecialchars(strip_tags($_POST['description']));

        modifier($image, $nom, $prix, $description, $id);
        
        header("Location: afficher.php");
   
     
    }
    }
}
?>