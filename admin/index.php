<?php
require("../config/commandes.php");
?>
<!DOCTYPE html>
<html>
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<title>Title of the document</title>
</head>

<body>
    <div class="album py-5 bg-light">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1">Titre de l'image</label>
    <input type="name" class="form-control" name="image" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Nom du produit</label>
    <input type="text" class="form-control" name="nom" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Prix</label>
    <input type="number" class="form-control" name="prix" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" required></textarea>
  </div>
  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
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

      try {
        ajouter($image, $nom, $prix, $description);
      } catch (Exception $e) {
        $e->getMessage();
      }
     
    }
    }
}
?>