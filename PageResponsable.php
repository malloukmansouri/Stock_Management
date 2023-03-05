<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shorcut icon" href="images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Page Responsable</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a  class="navbar-brand fw-bolder">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    <li class="nav-item">
        <a class="nav-link disabled" href="#">Partie Responsable</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">Passer la commande </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Produit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="produit/AfficherProduit.php">liste des produits</a>
          <a class="dropdown-item" href="produit/AjoutProduit.php">Ajouter un produit</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Entrepôts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="entrepot/Afficherentrepot.php">liste des entrepôts</a>
          <a class="dropdown-item" href="entrepot/Ajoutentrepot.php">Ajouter entrepôt</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php">
   
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Deconnexion</button> </form>
  </div>
</nav>

<?php 
          include("passerCommande.php");
        ?>

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>