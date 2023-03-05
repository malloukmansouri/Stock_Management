<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shorcut icon" href="images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Page Responsable</title>
</head>
<body>
<?php 
          include("../ClassePHP/commande.php");
          include("../BD/connectDB.php");
        ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a  class="navbar-brand">Gestion de Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    <li class="nav-item">
        <a class="nav-link disabled" href="#">Partie Responsable</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../PageResponsable.php">Passer la commande </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Produit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../produit/AfficherProduit.php">liste des produits</a>
          <a class="dropdown-item" href="../produit/AjoutProduit.php">Ajouter un produit</a>
        </div>
      </li>
      
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Entrepôts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">liste des entrepôts</a>
          <a class="dropdown-item" href="Ajoutentrepot.php">Ajouter entrepôt</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../index.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Deconnexion</button>
    </form>
  </div>
</nav>

<div class="container mt-5">
  <h2>Liste des Entrepôts</h2>
                       <table  class="table"> 
                    <tr class="thead-dark">
                       <th>Identifiant</th><th>Nom entrepot</th> <th>Nom responsable</th><th>Nom produit</th><th>Action</th>
                    </tr>
                  <?php

                        try {
                          $con=Connect();
                          $stmt=$con->prepare("SELECT * FROM responsabl_stock r,entrepot e,produit p WHERE e.id_resp=r.id_resp and e.id_prod=p.id_prod") ;
                          $stmt->execute();
                        }catch(PDOException $e)
                        {
                          echo  $e->getMessage();
                        }
                        while($ligne=$stmt->fetch()){
                        echo "<tr>";
                        echo "<td>".$ligne["num_entrepot"]."</td>";
                        echo "<td>".$ligne["nom_entrepot"]."</td>";
                        echo "<td>".$ligne["nom_resp"]."</td>";
                        echo "<td>".$ligne["nom_prod"]."</td>";
                        echo "<td><a href='SupEntrepot.php?num_entrepot=".$ligne["num_entrepot"]." ' onclick='return confirm(\"Voulez vous supprimer?\");' ><img src='../images/delete.png' style='height:20px;width:20px;' /></a> <td>";
                        echo "</tr>";

                        }

                                                                
                  ?>
                  
                  </table> 
                      </div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>